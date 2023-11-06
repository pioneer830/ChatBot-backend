<?php

namespace App\Repositories;



use App\Contracts\IntentionBaseInterface;
use App\Contracts\UserIntentionInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class IntentionRepository implements IntentionBaseInterface
{
    public function __construct(private readonly  UserIntentionInterface $service){}

    /**
     * @param $limit
     * @return mixed
     */
    public function getAllIntention($limit = null): mixed
    {
        return $this->service->getAllIntention($limit);
    }

    /**
     * @param $request
     * @return array|Builder[]|Collection
     */
    public function getUserIntention($request): Collection|array
    {
        return $this->service->getUserIntention($request);
    }

    /**
     * @param $userId
     * @return array|Builder[]|Collection
     */
    public function getUserIntentionByUserId($userId): Collection|array
    {
        return $this->service->getUserIntentionByUserId($userId);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function addUserIntention($request): mixed
    {
        return $this->service->addUserIntention($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function deleteUserIntention($request): mixed
    {
        return $this->service->deleteUserIntention($request);
    }

    /**
     * @param $request
     * @return bool
     */
    public function insertMultiIntentions($request): bool
    {
        return $this->service->insertMultiIntentions($request);
    }

}
