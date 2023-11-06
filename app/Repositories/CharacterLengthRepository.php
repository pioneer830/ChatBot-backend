<?php

namespace App\Repositories;




use App\Contracts\CharacterLengthBaseInterface;
use App\Contracts\UserCharacterLengthInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CharacterLengthRepository implements CharacterLengthBaseInterface
{
    public function __construct(private readonly  UserCharacterLengthInterface $service){}

    /**
     * @return mixed
     */
    public function getAllCharacterLength(): mixed
    {
        return $this->service->getAllCharacterLength();
    }

    /**
     * @param $request
     * @return array|Builder[]|Collection
     */
    public function getUserCharacterLength($request): Collection|array
    {
        return $this->service->getUserCharacterLength($request);
    }

    /**
     * @param $userId
     * @return array|Builder[]|Collection
     */
    public function getUserCharacterLengthByUserId($userId): Collection|array
    {
        return $this->service->getUserCharacterLengthByUserId($userId);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function addUserCharacterLength($request): mixed
    {
        return $this->service->addUserCharacterLength($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function deleteUserCharacterLength($request): mixed
    {
        return $this->service->deleteUserCharacterLength($request);
    }


}
