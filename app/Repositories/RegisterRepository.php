<?php

namespace App\Repositories;

use App\Contracts\RegisterBaseInterface;
use App\Contracts\RegisterServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class RegisterRepository implements RegisterBaseInterface
{

    public function __construct(private readonly RegisterServiceInterface $service){}

    /**
     * @return Collection
     */
    public function getAllJobs(): Collection
    {
        return $this->service->getAllJobs();
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Foundation\Application|Application|JsonResponse|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function register($request): Application|JsonResponse|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        return $this->service->register($request);
    }
}
