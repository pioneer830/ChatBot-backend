<?php

namespace App\Repositories;

use App\Contracts\HomeBaseInterface;
use App\Contracts\HomeServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Stripe\Exception\ApiErrorException;

class HomeRepository implements HomeBaseInterface
{
    public function __construct(private readonly HomeServiceInterface $service){}

    /**
     * @return mixed
     */
    public function getAllJob(): mixed
    {
        return $this->service->getAllJob();
    }

    /**
     * @return mixed
     */
    public function getAllIndustry(): mixed
    {
        return $this->service->getAllIndustry();
    }

    /**
     * @return mixed
     */
    public function getPlan(): mixed
    {
        return $this->service->getAllIndustry();
    }

    /**
     * @param $request
     * @param $user
     * @return bool
     */
    public function updateUserInfo($request, $user): bool
    {
        return $this->service->updateUserInfo($request, $user);
    }

    /**
     * @param $plan
     * @return array
     */
    public function payment($plan): array
    {
        return $this->service->payment($plan);
    }

    /**
     * @param $id
     * @param $plan
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function responseCheckout($id, $plan): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return $this->service->responseCheckout($id, $plan);
    }

    /**
     * @param $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function subscription($request): RedirectResponse
    {
        return $this->service->subscription($request);
    }

}
