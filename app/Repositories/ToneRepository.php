<?php

namespace App\Repositories;

use App\Contracts\ToneBaseInterface;
use App\Contracts\UserToneInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ToneRepository implements ToneBaseInterface
{
    public function __construct(private readonly  UserToneInterface $service){}

    /**
     * @param $limit
     * @return mixed
     */
    public function getAllTone($limit = null): mixed
    {
        return $this->service->getAllTone($limit);
    }

    /**
     * @param $request
     * @return array|Builder[]|Collection
     */
    public function getUserTone($request): Collection|array
    {
        return $this->service->getUserTone($request);
    }

    /**
     * @param $userId
     * @return array|Builder[]|Collection
     */
    public function getUserToneByUserId($userId): Collection|array
    {
        return $this->service->getUserToneByUserId($userId);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function addUserTone($request): mixed
    {
        return $this->service->addUserTone($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function deleteUserTone($request): mixed
    {
        return $this->service->deleteUserTone($request);
    }

    /**
     * @param $request
     * @return bool
     */
    public function insertMultiTones($request): bool
    {
        return $this->service->insertMultiTones($request);
    }

    /**
     * @param $request
     * @return bool[]
     */
    public function toneIntentionStatus($request): array
    {
        return $this->service->toneIntentionStatus($request);
    }

}
