<?php

namespace App\Service;

use App\Contracts\GuestHelperInterface;
use App\Contracts\UserToneInterface;
use App\Helper\Helper;
use App\Models\Tone;
use App\Models\UserIntention;
use App\Models\UserTone;
use App\Validators\ValidatorResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class UserToneService implements UserToneInterface
{
    private UserTone $userTone;

    public function __construct(private readonly GuestHelperInterface $guest)
    {
        $this->userTone = new UserTone();
    }

    /**
     * @param $request
     * @return mixed
     */
    private function getUserId($request): mixed
    {
        return ($request->type == 'ext') ? $this->guest->getClientId($request->client_id)->user_id : $request->user_id;
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getAllTone($limit = null): mixed
    {
        return (new Tone())->getAllTones();
    }

    /**
     * @param $request
     * @return Builder[]|Collection
     */
    public function getUserTone($request): Collection|array
    {
        $userId = $this->getUserId($request);
       return $this->userTone::with([
           'tone' => function($query){
           return $query->select('id', 'name');
           },
       ])->where('user_id', $userId)->get();
    }

    /**
     * @param $userId
     * @return Builder[]|Collection
     */
    public function getUserToneByUserId($userId): Collection|array
    {
        return $this->userTone::with([
            'tone' => function($query){
                return $query->select('id', 'name');
            },
        ])->where('user_id', $userId)->get();
    }

    /**
     * @param $request
     * @return mixed|string[]
     */
    public function addUserTone($request): mixed
    {
        $userId = $this->getUserId($request);
        $maxToneReached =  Helper::maxReached($this->userTone, $userId);

        if($maxToneReached) {
            return ValidatorResponse::maximumError('tone');
        }

        $userToneExist = $this->getTone($request->tone_id, $userId);
        if($userToneExist){
            return $this->updateUserTone($userToneExist, $request);
        }

        return $this->addTone($userId, $request->tone_id);
    }

    /**
     * @param $toneId
     * @return mixed
     */
    private function getTone($toneId, $userId): mixed
    {
        return $this->userTone::where(['tone_id' => $toneId, 'user_id' => $userId])->first();
    }

    /**
     * @param $userId
     * @param $toneId
     * @return mixed
     */
    private function addTone($userId, $toneId): mixed
    {
        return $this->userTone::create([
            'user_id' => $userId,
            'tone_id' => $toneId,
        ]);
    }

    /**
     * @param $userTone
     * @param $request
     * @return mixed
     */
    private function updateUserTone($userTone, $request): mixed
    {
        $userTone->tone_id = $request->tone_id ?? $userTone->tone_id;
        $userTone->save();
        return $userTone;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function deleteUserTone($request): mixed
    {
        $userId = $this->getUserId($request);
        return $this->userTone::where(['id' => $request->id, 'user_id' => $userId])->delete();
    }

    /**
     * @param $request
     * @return true
     */
    public function insertMultiTones($request): bool
    {
        $tones = json_decode($request->tones);
        self::tonesMultipleInsertion($tones);
        return true;

    }

    /**
     * @param $tones
     * @return void
     */
    public static function tonesMultipleInsertion($tones): void
    {
        $data = [];
        foreach($tones as $tone)
        {
            if(self::checkTone(ucwords($tone)) || empty($tone)){
                continue;
            }
            $data[]['name'] = ucwords($tone);
        }
        Tone::insert($data);
    }

    /**
     * @param $tone
     * @return bool
     */
    private static function checkTone($tone): bool
    {
        return (bool) Tone::where('name', ucwords($tone))->count();
    }

    /**
     * @param $request
     * @return bool[]
     */
    public function toneIntentionStatus($request): array
    {
        $userId = $this->getUserId($request);

        $tone =  $this->userTone::where('user_id', $userId)->count() > $request->tone;
        $intention = UserIntention::where('user_id', $userId)->count() > $request->intention;

        return [
            'tone' => $tone,
            'intention' => $intention
        ];
    }
}
