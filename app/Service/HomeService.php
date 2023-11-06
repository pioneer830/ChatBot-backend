<?php

namespace App\Service;

use App\Contracts\HomeServiceInterface;
use App\Models\Industry;
use App\Models\Job;
use App\Models\Plan;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Stripe\Exception\ApiConnectionException;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\AuthenticationException;
use Stripe\Exception\CardException;
use Stripe\Exception\InvalidRequestException;
use Stripe\Exception\RateLimitException;
use Stripe\StripeClient;

class HomeService implements HomeServiceInterface
{
    /**
     * @return mixed
     */
    public function getAllJob(): mixed
    {
        return Job::select(['id', 'name'])->get();
    }

    /**
     * @return mixed
     */
    public function getAllIndustry(): mixed
    {
        return Industry::select(['id', 'name'])->get();
    }

    /**
     * @return mixed
     */
    public function getPlan(): mixed
    {
        return Plan::select(['id', 'name', 'amount'])->orderBy('amount')->get();
    }

    /**
     * @param $request
     * @param $user
     * @return bool
     */
    public function updateUserInfo($request, $user): bool
    {
        if($user->update($request->all())) {
            return true;
        }
        return false;
    }

    /**
     * @param $plan
     * @return array
     */
    public function payment($plan): array
    {
        $error = "";
        $intent = null;
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $stripeOptions = [
                'description' => strtoupper($plan->plan_interval) . ' PLAN ' . $plan->name . ' SUBSCRIPTION',
                'shipping' => [
                    'name' => 'ProspectPal Subscription',
                    'address' => [
                        'line1' => '510 Townsend St',
                        'postal_code' => '98140',
                        'city' => 'San Francisco',
                        'state' => 'CA',
                        'country' => 'US',
                    ],
                ],
                'amount' => $plan->amount * 1000,
                'currency' => 'usd',
                // Verify your integration in this guide by including this parameter
                'metadata' => ['integration_check' => 'accept_a_payment'],
            ];

            $intent = $stripe->paymentIntents->create($stripeOptions);

//            try {
//                $user = Auth::user();
//                $user->newSubscription('default', $plan->id)
//                    ->trialDays(7)
//                    ->create(Cashier::stripe([
//                        "api_key" => env('STRIPE_SECRET')
//                    ]));
//            } catch (\Exception $e) {
//                dd($e);
//            }
        } catch (CardException $e) {
            $error = $e->getError()->message;
        } catch (RateLimitException $e) {
            $error = 'Too many requests made to the API too quickly';
        } catch (InvalidRequestException $e) {
            $error = "Invalid parameters were supplied to Stripe's API";
        } catch (AuthenticationException $e) {
            $error = "Authentication with Stripe's API failed";
            // (maybe you changed API keys recently)
        } catch (ApiConnectionException $e) {
            $error = "Network communication with Stripe failed";
        } catch (ApiErrorException|Exception $e) {
            $error = "An error occurred try again";
        }

        return [
            'intent' =>$intent,
            'error' => $error
        ];
    }

    /**
     * @param $id
     * @param $plan
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function responseCheckout($id, $plan): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $error = $status = '';
        if(isset($id)){
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            try{
                $payment_intent = $stripe->paymentIntents->retrieve($id);
                if(isset($payment_intent)){
                    $status = $payment_intent->status;
                }

            } catch(CardException $e) {
                $error =  $e->getError()->message;
            } catch (RateLimitException $e) {
                $error = 'Too many requests made to the API too quickly';
            } catch (InvalidRequestException $e) {
                $error = "Invalid parameters were supplied to Stripe's API";
            } catch (AuthenticationException $e) {
                $error = "Authentication with Stripe's API failed";
                // (maybe you changed API keys recently)
            } catch (ApiConnectionException $e) {
                $error = "Network communication with Stripe failed";
            } catch (ApiErrorException|Exception $e) {
                $error = "An error occurred try again";
            }

            if($error){
                return view('user.payment-response')->with(['response'=>'failed','message'=>$error]);
            }

            if($status =='succeeded'){
                Auth::user()->subscribePlan($plan, $id);
                return view('user.payment-response')->with(['response'=>'success','message'=>'Payment completed successfully!']);
            }
        }

        return view('user.payment-response')->with(['response'=>'failed','message'=>'Payment was not successful! try again']);
    }

    /**
     * @param $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function subscription($request): RedirectResponse
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        try {
            $stripe->charges->create([
                'amount' => 1000, // Amount in cents
                'currency' => 'usd',
                'source' => $request->get('_token'),
                'description' => 'Example charge',
            ]);

            return redirect()->back()->with('success', 'Payment processed successfully.');
        } catch (CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            $body = $e->getJsonBody();
            $err  = $body['error'];

            return redirect()->back()->with('error', 'Payment failed: ' . $err['message']);
        } catch (RateLimitException $e) {
            // Too many requests made to the API too quickly
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (AuthenticationException $e) {
            // Authentication with Stripe's API failed
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        } catch (ApiConnectionException $e) {
            // Network communication with Stripe failed
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }


}
