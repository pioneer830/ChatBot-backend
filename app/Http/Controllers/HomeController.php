<?php

namespace App\Http\Controllers;

use App\Contracts\HomeBaseInterface;
use App\Helper\Helper;
use App\Mail\Invoice;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Repositories\PlanRepository;
use App\Service\ExtensionService;
use App\Service\UserService;
use App\Utils\AppConstant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private readonly  HomeBaseInterface $repository){}

    /**
     * Show the application dashboard.
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(Request $request): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('home', [
            'jobs' =>$this->repository->getAllJob(),
            'industries' => $this->repository->getAllIndustry(),
            'isSocialLogin' => $request->session()->get("isSocialLogin")
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function plans(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view("user.plans", [
            'plans' => $this->repository->getPlan(),
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function customize(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view("user.customize");
    }

    /**
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function updateUserInfo(Request $request, User $user): JsonResponse
    {
        return ($this->repository->updateUserInfo($request, $user)) ?
            response()->json(['msg' => 'success']):
            response()->json(['msg' => 'failed']);

    }

    /**
     * @param Request $request
     * @param Plan $plan
     * @return Application|Factory|View|\Illuminate\Foundation\Application|RedirectResponse
     */
    public function payment(Request $request, Plan $plan): \Illuminate\Foundation\Application|View|Factory|RedirectResponse|Application
    {
        $data = $this->repository->payment($plan);
        // if(!empty($data['error'])){
        //     return redirect()->back()->with(['error'=>$data['error']]);
        // }
        return view("user.payment", [
            // 'secret_id' => $data['intent']->client_secret,
            'plan' => $plan
        ]);
    }

    /**
     * @param Request $request
     * @param PlanRepository $planRepository
     * @return RedirectResponse
     */
    public function doPayment(Request $request, PlanRepository $planRepository)
    {

        $planRepository->end_date = addDayWithCurrentTime(AppConstant::SUBSCRIPTION_DAYS);
        $response = $planRepository->payment($request);
        if ($response['status']) {
            return redirect()->route('thank-you', ['plan' => $response['plan']]);
        }
        return redirect()->back()->with('error', $response['message']);
    }

    public function thankYou($plan_name = null)
    {
        return view('user.thank-you', [
            'plan_name' => $plan_name
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @param Plan $plan
     * @return \Illuminate\Foundation\Application|View|Factory|Application
     */
    public function responseCheckout(Request $request, $id, Plan $plan): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return $this->repository->responseCheckout($id, $plan);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function subscription(Request $request): RedirectResponse
    {
        return $this->repository->subscription($request);
    }



    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function cancelSubscription(Request $request, UserService  $service): RedirectResponse
    {
        $result = $service->setPlan($request);
        if ($result['status']){
            removePlanIdSession();
            ExtensionService::removeAllSession();
            return redirect()->back()->with('success', $result['message']);
        }
         return redirect('/')->with('error', $result['message']);
    }


    public function showCancellationPage()
    {
        $plan = Helper::userPlan();
        return view('subscription.cancel', compact('plan'));
    }



}
