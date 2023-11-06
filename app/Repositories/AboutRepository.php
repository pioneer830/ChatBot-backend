<?php

namespace App\Repositories;

use App\Contracts\AboutInterface;
use App\Contracts\AboutBaseInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AboutRepository implements  AboutBaseInterface
{
    private AboutInterface $aboutService;
    public function __construct(AboutInterface $aboutService)
    {
        $this->aboutService = $aboutService;
    }

    /**
     * @param $clientId
     * @return Builder|Model|null
     */
    public function getUserAbout($clientId): Model|Builder|null
    {
        return $this->aboutService->getUserAbout($clientId);
    }

    public function getUserAbout2($request)
    {
        return $this->aboutService->getUserAbout($request);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function storeUserAbout($request): mixed
    {
        return $this->aboutService->storeUserAbout($request);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function deleteUserAbout($userId): mixed
    {
        return $this->aboutService->deleteUserAbout($userId);
    }

}
