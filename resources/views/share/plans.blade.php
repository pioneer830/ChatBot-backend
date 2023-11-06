<!-- Pricing -->

@php
    $monthPlans = \App\Models\Plan::where('plan_interval', 'month')->orderBy('id')->get();
    $yearPlans = \App\Models\Plan::where('plan_interval', 'year')->orderBy('id')->get();
    $user = \Illuminate\Support\Facades\Auth::user();
    if($user != null) {
        $last_sub = $user->lastSubscription();
    }
@endphp

    <!-- Illustration -->
{{--<div class="np cx y w _ rg v te" aria-hidden="true">
    <img src="{{asset('assets/images/pricing-illustration.svg')}}" class="ri" width="618"
         height="468" alt="Pricing Illustration">
</div>

<div class="rr tf ot ld">
    <div class="oo ca i_ iq">

        <!-- Section header -->
        @if ($show_title)
            <div class="rf tf ox om cp">
                <h2 class="h2 o_ tm">Find a plan that's right for you</h2>
                <div class="rl tf">
                    <p class="oq up">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est.</p>
                </div>

            </div>
        @endif

    <!-- MONTHLY -->
        <!-- Pricing tables -->



        <div class="rf tf ox om cp">
            <div class="switch-wrapper">
                <input id="monthly" type="radio" name="switch" checked>
                <input id="yearly" type="radio" name="switch">
                <label for="monthly">Monthly</label>
                <label for="yearly">Yearly 30% OFF</label>
                <span class="highlighter"></span>
            </div>
        </div>

        <!-- <div id="monthlyPlans" class="rf tf ox om cp">
            <h2 class="h2 o_ tm">Monthly Plans</h2>
        </div>

        <div id="yearlyPlans" class="rf tf ox om cp" hidden>
            <h2 class="h2 o_ tm">Yearly Plans</h2>
        </div> -->
        @php
                $user = \Illuminate\Support\Facades\Auth::user();
                if($user != null) {
                    $last_sub = $user->lastSubscription();
                }

        @endphp

        <div id="monthlyPlanItems" class="ru tf nh io cq ht rz c_ oy plan-items">
            @foreach($monthPlans as $key => $plan)
                @include("share._plan", [
                        "plan" => $plan,
                        "duration"=> "month",
                        "active" => ((isset($last_sub) && $last_sub->plan_id == $plan->id) || (!isset($last_sub) && $user != null && $plan->amount == 0) || ($user == null && $key == 1)),
                        "user" => $user
                ])
            @endforeach
        </div>

        <!----->

        <div id="yearlyPlanItems" class="ru tf nh io cq ht rz c_ oy plan-items" style='display:none;'>
            @foreach($yearPlans as $key => $plan)
                @include("share._plan", [
                            "plan" => $plan,
                            "duration"=> "year",
                            "active" => ((isset($last_sub) && $last_sub->plan_id == $plan->id) || (!isset($last_sub) && $user != null && $plan->amount == 0) || ($user == null && $key == 1)),
                            "user" => $user
                        ])
            @endforeach
        </div>

    </div>


</div>
</div>--}}

<div id="monthlyPlanItems" class="row pricing-table">
    <div class="col-md-2 col-xl-2 grid-margin stretch-card pricing-card"></div>
    @foreach($monthPlans as $key => $plan)
        <div class="col-md-4 col-xl-4 grid-margin stretch-card pricing-card">
        @include("share._plan", [
                "plan" => $plan,
                "duration"=> "month",
                "active" => ((isset($last_sub) && $last_sub->plan_id == $plan->id) || (!isset($last_sub) && $user != null && $plan->amount == 0) || ($user == null && $key == 1)),
                "user" => $user
        ])
        </div>
    @endforeach
</div>
<div id="yearlyPlanItems" class="row pricing-table" style='display:none;'>
    <div class="col-md-2 col-xl-2 grid-margin stretch-card pricing-card"></div>
    @foreach($yearPlans as $key => $plan)
        <div class="col-md-4 col-xl-4 grid-margin stretch-card pricing-card">
        @include("share._plan", [
                    "plan" => $plan,
                    "duration"=> "year",
                    "active" => ((isset($last_sub) && $last_sub->plan_id == $plan->id) || (!isset($last_sub) && $user != null && $plan->amount == 0) || ($user == null && $key == 1)),
                    "user" => $user
                ])
        </div>
    @endforeach

    {{--   <div class="col-md-6 col-xl-4 grid-margin stretch-card pricing-card">
           <div class="card border-primary border pricing-card-body">
               <div class="text-center pricing-card-head">
                   <h3>Free</h3>
                   <p>Basic Plan</p>
                   <h1 class="font-weight-normal mb-4">$00.00</h1>
               </div>
               <ul class="list-unstyled plan-features">
                   <li>Email preview on air</li>
                   <li>Spam testing and blocking</li>
                   <li>10 GB Space</li>
                   <li>50 user accounts</li>
                   <li>Free support for one years</li>
                   <li>Free upgrade for one year</li>
               </ul>
               <div class="wrapper">
                   <a class="btn btn-outline-primary btn-block"
                      href="javascript:void(0)">Download</a>
               </div>
               <p class="mt-3 mb-0 plan-cost text-gray">Free</p>
           </div>
       </div>
       <div class="col-md-6 col-xl-4 grid-margin stretch-card pricing-card">
           <div class="card border border-success pricing-card-body">
               <button type="button" class="btn btn-success btn-rounded btn-fw position-absolute fw-bold" style="top:-15px;right:10px;">Selected</button>
               <div class="text-center pricing-card-head">
                   <h3 class="text-success">Professional</h3>
                   <p>For Business</p>
                   <h1 class="font-weight-normal mb-4">$50.90</h1>
               </div>
               <ul class="list-unstyled plan-features">
                   <li>Email preview on air</li>
                   <li>Spam testing and blocking</li>
                   <li>50 GB Space</li>
                   <li>100 user accounts</li>
                   <li>Free support for two years</li>
                   <li>Free upgrade for two year</li>
               </ul>
               <div class="wrapper">
                   <a class="btn btn-success btn-block" href="javascript:void(0)">Start trial</a>
               </div>
               <p class="mt-3 mb-0 plan-cost text-success">or purchase now</p>
           </div>
       </div>
       <div class="col-md-6 col-xl-4 grid-margin stretch-card pricing-card">
           <div class="card border border-primary pricing-card-body">
               <div class="text-center pricing-card-head">
                   <h3>Enterprise</h3>
                   <p>Custom Business</p>
                   <h1 class="font-weight-normal mb-4">$80.90</h1>
               </div>
               <ul class="list-unstyled plan-features">
                   <li>Email preview on air</li>
                   <li>Spam testing and blocking</li>
                   <li>100 GB Space</li>
                   <li>200 user accounts</li>
                   <li>Free support for two years</li>
                   <li>Free upgrade for two year</li>
               </ul>
               <div class="wrapper">
                   <a class="btn btn-outline-primary btn-block" href="javascript:void(0)">Start
                       trial</a>
               </div>
               <p class="mt-3 mb-0 plan-cost text-gray">or purchase now</p>
           </div>
       </div>--}}
</div>



{{--<script>
    $(".plan-description ul li").each(function () {
        $(this).prepend(`<svg class="nz ng sk ub tb rv" viewBox="0 0 12 12"
                                   xmlns="http://www.w3.org/2000/svg">
    <path
        d="M10.28 2.28L3.989 8.575 1.695 6.28A1 1 0 00.28 7.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 2.28z"></path>
</svg>`)
    })
</script>--}}
@push('script')
<script>
    const monthlyButton = document.getElementById("monthly");
    const yearlyButton = document.getElementById("yearly");

    $("#monthly").click(function () {
        $('#yearlyPlans').hide();
        $('#yearlyPlanItems').hide();
        $('#monthlyPlans').show();
        $('#monthlyPlanItems').show();
    });

    $("#yearly").click(function () {
        $('#yearlyPlans').show();
        $('#yearlyPlanItems').show();
        $('#monthlyPlanItems').hide();
        $('#monthlyPlans').hide();
    });

</script>
@endpush


