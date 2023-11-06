<?php

namespace App\Repositories;

use App\Contracts\LoginBaseInterface;
use App\Contracts\LoginServiceInterface;
use Illuminate\Http\RedirectResponse;

class LoginRepository implements LoginBaseInterface
{
    public function __construct(private readonly LoginServiceInterface $service){}

    /**
     * @param $user
     * @return mixed
     */
    public function authenticated($user): mixed
    {
        return $this->service->authenticated($user);
    }

    /**
     * @return mixed
     */
    public function deleteGuests(): mixed
    {
        return $this->service->deleteGuests();
    }

    /**
     * @return bool
     */
    public function logout(): bool
    {
        return $this->service->logout();
    }

    /**
     * @return RedirectResponse
     */
    public function googleCallback(): RedirectResponse
    {
        return $this->service->googleCallback();
    }

}
