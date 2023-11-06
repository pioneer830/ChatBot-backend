<?php

namespace App\Service;

use App\Contracts\GuestHelperInterface;
use App\Contracts\UserIntentionInterface;
use App\Helper\Helper;
use App\Models\Intention;
use App\Models\UserIntention;
use App\Validators\ValidatorResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserIntentionService implements UserIntentionInterface
{
    private UserIntention $userIntention;

    public function __construct(private readonly GuestHelperInterface $guest)
    {
        $this->userIntention = new UserIntention();
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
    public function getAllIntention($limit = null): mixed
    {
        return (new Intention())->getAllIntentions();
    }

    /**
     * @param $request
     * @return Builder[]|Collection
     */
    public function getUserIntention($request): Collection|array
    {
        $userId = $this->getUserId($request);
       return $this->userIntention::with([
           'intention' => function($query){
           return $query->select('id', 'name');
           },
       ])->where('user_id', $userId)->get();
    }

    /**
     * @param $userId
     * @return Builder[]|Collection
     */
    public function getUserIntentionByUserId($userId): Collection|array
    {
        return $this->userIntention::with([
            'intention' => function($query){
                return $query->select('id', 'name');
            },
        ])->where('user_id', $userId)->get();
    }

    public function addUserIntention($request)
    {
        $userId = $this->getUserId($request);
        $maxIntentionReached =  Helper::maxReached($this->userIntention, $userId);
        if($maxIntentionReached) {
            return ValidatorResponse::maximumError('intention');
        }

        $userIntentionExist = $this->getIntention($request->intention_id, $userId);
        if($userIntentionExist){
            return $this->updateUserTone($userIntentionExist, $request);
        }

        return $this->addIntention($userId, $request->intention_id);
    }

    /**
     * @param $intentionId
     * @param $userId
     * @return mixed
     */
    private function getIntention($intentionId, $userId): mixed
    {
        return $this->userIntention::where(['intention_id' => $intentionId, 'user_id' => $userId])->first();
    }

    /**
     * @param $userId
     * @param $intentionId
     * @return mixed
     */
    private function addIntention($userId, $intentionId): mixed
    {
        return $this->userIntention::create([
            'user_id' => $userId,
            'intention_id' => $intentionId,
        ]);
    }

    /**
     * @param $userIntention
     * @param $request
     * @return mixed
     */
    private function updateUserTone($userIntention, $request): mixed
    {
        $userIntention->intention_id = $request->intention_id ?? $userIntention->intention_id;
        $userIntention->save();
        return $userIntention;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function deleteUserIntention($request): mixed
    {
        $userId = $this->getUserId($request);
        return $this->userIntention::where(['id' => $request->id, 'user_id' => $userId])->delete();
    }


    /**
     * @param $request
     * @return true
     */
    public function insertMultiIntentions($request): bool
    {
        $intentions = json_decode($request->intentions);
        self::intentionsMultipleInsertion($intentions);
        return true;

    }

    /**
     * @param $intentions
     * @return void
     */
    public static function intentionsMultipleInsertion($intentions): void
    {
        $data = [];
        foreach($intentions as $key => $intention)
        {
            if(self::checkIntention(ucwords($intention)) || empty($intention)){
                continue;
            }
            $data[]['name'] = ucwords($intention);
        }

        Intention::insert($data);
    }

    /**
     * @param $intention
     * @return bool
     */
    private static function checkIntention($intention): bool
    {
        return (bool) Intention::where('name', ucwords($intention))->count();
    }




}
