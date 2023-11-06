<?php

namespace App\Helper;

use App\Models\Guest;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Support\Str;

class Helper
{
    public const MAX_USER_TONE = 15;

    public static function maxReached($class, $userId): bool
    {
        return $class::where('user_id', $userId)->count() >= self::MAX_USER_TONE;
    }

    public static function getUserId($request)
    {
        return ($request->type == 'ext') ? GuestHelper::getClientId($request->client_id)->user_id : $request->user_id;
    }

    public static function setDefaultPlan($userId)
    {
        Subscription::create([
            'user_id' => $userId,
            'plan_id' => Plan::DEFAULT_PLAN['id'] ?? 1,
            'name' => Plan::DEFAULT_PLAN['name'] ?? 'Free',
            'stripe_id' => Str::random(10),
            'stripe_status' => '',
            'stripe_price' => '0',
        ]);
    }

    public static function userPlan()
    {
        return Subscription::select('subscriptions.*', 'plans.plan_interval', 'plans.amount')
            ->join('plans', 'plans.id', 'subscriptions.plan_id')
            ->where('subscriptions.user_id', auth()->id())
            ->orderBy('subscriptions.id', 'DESC')
            ->first();
    }

}
