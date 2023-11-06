<?php

namespace App\Library;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

trait Subscription
{
    public function registerSubscription()
    {
        Gate::before( function ($user, $ability) {
           return $this->userSubscription($user, $ability);
        });
    }

    /**
     * @param $user
     * @param $ability
     * @return bool
     */
    private function userSubscription($user, $ability): bool
    {
        try {
            return \App\Models\Subscription::where([
                    'user_id' => $user->id ?? auth()->id(),
                    'name' => Str::title($ability),
                ])->count() === 1;
        } catch (\Exception $e) {
            return false;
        }
    }
}
