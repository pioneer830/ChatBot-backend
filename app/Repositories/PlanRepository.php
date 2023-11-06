<?php

namespace App\Repositories;

use App\Contracts\AboutInterface;
use App\Contracts\AboutBaseInterface;
use App\Helper\Helper;
use App\Mail\Invoice;
use App\Models\Plan;
use App\Models\Subscription;
use App\Service\ExtensionService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;

class PlanRepository
{

    public $end_date = null;
    /**
     * @param $request
     * @return array
     */
    public function payment($request): array
    {
        try {
            list($plan, $payable) = $this->checkExistPlan($request);

            Stripe::setApiKey(config('app.STRIPE_SECRET'));
            $product = \Stripe\Product::create([
                'name' => 'Membership',
            ]);
            $price = \Stripe\Price::create([
                'unit_amount' => $payable * 100,
                'currency' => 'usd',
                'recurring' => [
                    'interval' => $plan->plan_interval,
                ],
                'product' => $product->id,
            ]);
            $customer = \Stripe\Customer::create([
                'email' => $request->email,
                'source' => $request->stripeToken,
            ]);

            
            $subscription = \Stripe\Subscription::create([
                'customer' => $customer->id,
                'items' => [
                    [
                        'price' => $price->id,
                    ],
                ],
                'trial_period_days' => intval($plan->trial_period_days),

                // test line
                // 'trial_period_days' => 0,
            ]);

            $this->addSubscription($plan, $subscription);

            try {
                $user = Auth::user();
                Mail::to($user->email)->send(new Invoice($stripe->receipt_url));
            } catch (\Exception $e) {
                report($e);
            }

            removePlanIdSession();
            ExtensionService::removeAllSession();
            return [
                'status' => true,
                'plan' => $plan->name ?? '',
                'message' => '',
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'plan' => $plan->name ?? '',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * @param $plan
     * @param $stripe
     * @return void
     */
    private function addSubscription($plan, $stripe)
    {
        Subscription::create([
            'user_id' => auth()->id(),
            'plan_id' => $plan->id,
            'name' => $plan->name,
            'stripe_id' => $stripe->id,
            'stripe_price' => round($stripe->amount / 100, 2),
            'stripe_status' => $stripe->succeeded ?? '',
            'ends_at' => $this->end_date,
            'trial_ends_at' => Carbon::now()->addDays($plan->trial_period_days),
        ]);
    }

    /**
     * @param $request
     * @return array
     */
    private function checkExistPlan($request): array
    {
        $user_plan = Helper::userPlan();
        $plan = Plan::find($request->plan_id);
        $payableAmount = ($plan->amount - $user_plan?->amount ?? 0);

        if ($payableAmount < 1) {
            throw new \Exception("Amount should be greater than 0");
        }
        return [
            $plan,
            $payableAmount
        ];
    }
}
