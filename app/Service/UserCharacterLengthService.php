<?php

namespace App\Service;

use App\Contracts\GuestHelperInterface;
use App\Contracts\UserCharacterLengthInterface;
use App\Helper\Helper;
use App\Models\CharacterLength;
use App\Models\UserCharacterLength;
use App\Models\UserTone;
use App\Validators\ValidatorResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserCharacterLengthService implements UserCharacterLengthInterface
{
    private UserCharacterLength $charLength;

    public function __construct(private readonly GuestHelperInterface $guest)
    {
        $this->charLength = new UserCharacterLength();
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
     * @return mixed
     */
    public function getAllCharacterLength(): mixed
    {
        return CharacterLength::select('id', 'name')->orderBy('name', 'ASC')->get();
    }

    /**
     * @param $request
     * @return Builder[]|Collection
     */
    public function getUserCharacterLength($request): Collection|array
    {
        $userId = $this->getUserId($request);
       return $this->charLength::with([
           'characterLength' => function($query) {
               return $query->select('id', 'name');
           }
       ])->where('user_id', $userId)->get();
    }

    /**
     * @param $userId
     * @return Builder[]|Collection
     */
    public function getUserCharacterLengthByUserId($userId): Collection|array
    {
        return $this->charLength::with([
            'characterLength' => function($query){
                return $query->select('id', 'name');
            },
        ])->where('user_id', $userId)->get();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function addUserCharacterLength($request): mixed
    {
        $userId = $this->getUserId($request);

        $maxCharLengthReached =  Helper::maxReached($this->charLength, $userId);

        if($maxCharLengthReached) {
            return ValidatorResponse::maximumError('character length');
        }
        $charLengthExist = $this->getCharLength($request->character_length_id);
        if($charLengthExist){
            return $this->updateUserTone($charLengthExist, $request);
        }

        return $this->addCharLength($userId, $request->character_length_id);
    }

    /**
     * @param $charLengthId
     * @return mixed
     */
    private function getCharLength($charLengthId): mixed
    {
        return $this->charLength::where('character_length_id', $charLengthId)->first();
    }

    /**
     * @param $userId
     * @param $charLengthId
     * @return mixed
     */
    private function addCharLength($userId, $charLengthId): mixed
    {
        return $this->charLength::create([
            'user_id' => $userId,
            'character_length_id' => $charLengthId
        ]);
    }

    /**
     * @param $charLength
     * @param $request
     * @return mixed
     */
    private function updateUserTone($charLength, $request): mixed
    {
        $charLength->character_length_id = $request->character_length_id ?? $charLength->character_length_id;
        $charLength->save();
        return $charLength;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function deleteUserCharacterLength($request): mixed
    {
        $userId = $this->getUserId($request);
        return $this->charLength::where(['id' => $request->id, 'user_id' => $userId])->delete();
    }



}
