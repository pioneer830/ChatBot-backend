<?php

namespace App\Service;

use App\Models\Intention;
use App\Models\Tone;
use App\Models\UserIntention;
use App\Models\UserTone;
use App\Transformer\GetUserAboutTransformer;
use phpDocumentor\Reflection\Types\Collection;

class ExtensionService
{

    const TONE_CACHE_KEY = 'tone';
    const TONE_USER_SESSION_KEY = 'user_tone';

    const INTENTION_CACHE_KEY = 'intention';
    const INTENTION_USER_SESSION_KEY = 'user_intention';
    //const

    public static function getExtensionValues(): string
    {
        $tones = self::getExtensionCache(self::TONE_CACHE_KEY);
        $intentions = self::getExtensionCache(self::INTENTION_CACHE_KEY);

        $data['isLogin'] = 0;
        $data['is_allow_multiple_tone_select'] = 0;
        $data['is_allow_user_info'] = 0;
        $data['plan'] = "GUEST";

        $data['user_tone'] = self::getExtensionSession(self::TONE_USER_SESSION_KEY);
        $data['user_intention'] = self::getExtensionSession(self::INTENTION_USER_SESSION_KEY);

        $user = auth()->user();

        if(count($tones) == 0){
            $tones = (new Tone())->getAllTones(10);
            self::setExtensionCache(self::TONE_CACHE_KEY,$tones);
        }

        if(count($intentions) == 0){
            $intentions = (new Intention())->getAllIntentions(10);
            self::setExtensionCache(self::INTENTION_CACHE_KEY,$intentions);
        }

        if(!empty($user)){
            $user_id = $user->id;
            $data['isLogin'] = 1;

            $data['plan'] = getCurrentPlanName();

            if($data['plan'] == 'PRO' || $data['plan'] == 'STARTER') {
                $data['auth'] = GetUserAboutTransformer::transform($user);
                $data['is_allow_multiple_tone_select'] = 1;
                $data['is_allow_user_info'] = 1;
            }

            if(empty($data['user_tone'])){
                $user_tones = (new UserTone())->getTonesByUserId($user_id);
                $data['user_tone'] = self::prepareTones($user_tones);

                if(!empty($data['user_tone'])) {
                    self::setExtensionSession(self::TONE_USER_SESSION_KEY, $data['user_tone']);
                }
            }

            if(empty($data['user_intention'])){
                $user_intentions = (new UserIntention())->getUserIntentionByUserId($user_id);
                $data['user_intention'] = self::prepareIntentions($user_intentions);

                if(!empty($data['user_intention'])) {
                    self::setExtensionSession(self::INTENTION_USER_SESSION_KEY, $data['user_intention']);
                }
            }

        }else{
            $data['user_tone'] = $tones;
            $data['user_intention'] = $intentions;
        }

        return json_encode($data);
    }


    private static function prepareTones($user_tones){
        $user_tone_array = [];
        if(!empty($user_tones)) {
            foreach ($user_tones as $tone){
                $user_tone_array[] = [
                    'id'=> $tone->tone->id,
                    'name'=> $tone->tone->name,
                ];
            }
        }

        return $user_tone_array;
    }

    private static function prepareIntentions($user_intentions){
        $user_intention_array = [];
        if(!empty($user_intentions)) {
            foreach ($user_intentions as $intention){
                $user_intention_array[] = [
                    'id'=> $intention->intention->id,
                    'name'=> $intention->intention->name,
                ];
            }
        }

        return $user_intention_array;
    }

    public static function removeAllSession(){
        session()->forget(self::TONE_USER_SESSION_KEY);
        session()->forget(self::INTENTION_USER_SESSION_KEY);
    }

    public static function removeExtensionCache($key)
    {
        cache()->forget($key);
    }

    public static function getExtensionCache($key)
    {
        return cache()->get($key) ?? [];
    }

    public static function setExtensionCache($key, $value): void
    {
        cache()->put($key, $value);
    }


    public static function removeExtensionSession($key)
    {
        session()->forget($key);
    }

    public static function getExtensionSession($key)
    {
        return session()->get($key) ?? [];
    }

    public static function setExtensionSession($key, $value): void
    {
        session()->put($key, $value);
    }

}
