<?php

namespace App\Service;

use App\Contracts\AboutInterface;
use App\Contracts\UserInterface;
use App\Helper\Helper;
use App\Models\About;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserService implements UserInterface
{
    /**
     * @param $request
     * @return array
     */
    public function setPlan($request): array
    {
        try {
            Subscription::where('id', $request->plan_id)->update([
                'plan_id' => Plan::DEFAULT_PLAN['id'] ?? 1,
                'name' => Plan::DEFAULT_PLAN['name'] ?? 'Free',
                'stripe_price' => 0,
            ]);
            return [
                'status'=> true,
                'message'=> 'Subscription cancelled successfully.',
            ];
        } catch (\Exception $e){
            return [
                'status'=> false,
                'message'=> $e->getMessage(),
            ];
        }
    }
}
