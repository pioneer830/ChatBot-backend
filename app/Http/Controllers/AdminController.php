<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlansRequest;
use App\Models\Plan;
use App\Service\PlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $per_page = 10;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $user = Auth::user();
        if($user->id != 1) {
            return redirect()->route("home");
        }

        return view("admin.index");
    }

    public function planIndex(Request $request)
    {
        $plans = PlanService::searchIndex($request->all())->paginate($this->per_page);

        return view("admin.plans.index", [
            "plans" => $plans,
            "search_params" => $request->all()
        ]);
    }

    public function createPlan(Request $request)
    {
        return view("admin.plans.create");
    }

    public function editPlan(Request $request, Plan $plan)
    {
        return view("admin.plans.edit", [
            "plan" => $plan
        ]);
    }

    public function storePlan(PlansRequest $request)
    {
        if(PlanService::store($request->all())) {
            $request->session()->flash('success', 'Plan created.');
        } else {
            $request->session()->flash('error', 'Plan create Failed.');
        }
        return redirect()->route("admin.plans.index");
    }

    public function updatePlan(PlansRequest $request, Plan $plan)
    {
        if($plan->update($request->all())) {
            $request->session()->flash('success', 'Plan updated.');
        } else {
            $request->session()->flash('error', 'Plan update Failed.');
        }
        return redirect()->route("admin.plans.index");
    }

    public function deletePlan(Request $request, Plan $plan)
    {

    }
}
