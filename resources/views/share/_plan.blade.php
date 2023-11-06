@php
if (userPlanId() > 0 && $plan->id == userPlanId()) {
    $active = true;
} else {
  $active = false;
}
$is_success = $user && $active;
@endphp
{{--
<div class="b nl rj ny oe aos-init aos-animate {{ $active ? 'sr' : '' }}" data-aos="zoom-out" data-aos-delay="100">

    @if ($active)
        <div class="y j k tx tk">
            <div class="nc ie oj us oi on uw si ig">
                <svg class="s_ t_" width="12" height="14" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.315.068a.5.5 0 0 0-.745.347A7.31 7.31 0 0 1 3.182 3.6a7.924 7.924 0 0 1-.8.83A6.081 6.081 0 0 0 0 9.035a5.642 5.642 0 0 0 2.865 4.9.5.5 0 0 0 .746-.4 2.267 2.267 0 0 1 .912-1.67 4.067 4.067 0 0 0 1.316-1.4 4.662 4.662 0 0 1 1.819 3.1.5.5 0 0 0 .742.371c1.767-.999 2.86-2.87 2.865-4.9-.001-3.589-2.058-6.688-5.95-8.968Z"></path>
                </svg>
                @if ($user)
                    <span>Selected</span>
                @else
                    <span>Most Popular</span>
                @endif
            </div>
        </div>
    @endif
    <div class="td">
        <div class="oz us tw">{{ $plan->name }} </div>
        <div class="o_ nc it tg">
            <span class="ut ui up">$</span>
            <span class="ue uo uf">{{ number_format($plan->amount, 2) }}</span>
            <span class="ui up">/{{ $duration }}</span>
        </div>
        <div class="up td">{{ $plan->plan_option }}</div>
            @if ($user && $active)
            <a class="r ud su sl sv fr nj ao fj"  href="#">
                View Plan
            @elseif($plan->amount == 0)
            <a class="r ud su sl sv fr nj ao fj"  href="#">
                 Already included<span class="uc uv fq ac ah ap tp">-&gt;</span>
--}}
{{--                Start Free Plan--}}{{--

            @else
            <a class="r ud su sl sv fr nj ao fj"  href="{{ route("payment", ["plan" => $plan->id]) }}">
                Choose This Plan <span class="uc uv fq ac ah ap tp">-&gt;</span>
--}}
{{--                Start {{ $plan->trial_period_days }} days Free Trial--}}{{--

                @endif
        </a>
        <div class="plan-description">{!! $plan->plan_description !!}</div>
    </div>


</div>
--}}

    <div class="card border border-{{$is_success ? 'success':'primary'}} pricing-card-body">
        @if ($is_success)
        <button type="button" class="btn btn-success btn-rounded btn-fw position-absolute fw-bold" style="top:-15px;right:10px;">Selected</button>
        @endif
        <div class="text-center pricing-card-head">
            <h3 class="text-{{$is_success ? 'success':'primary'}}">{{ $plan->name }}</h3>
            <h3 class="font-weight-normal mb-4">${{ number_format($plan->amount, 2) }}/{{ $duration }}</h3>
        </div>
        <div class="wrapper pb-2">
            @if($is_success)
                <a class="btn btn-success btn-block" href="#">View plan</a>
            @elseif($plan->amount == 0)
                <p class="btn btn-primary btn-block" style="cursor: not-allowed">Already Included</p>
            @else
                <a class="btn btn-outline-primary btn-block" href="{{ route("payment", ["plan" => $plan->id]) }}">Choose this plan</a>
            @endif
        </div>
        <div class="list-unstyled plan-features text-center">
        {!! $plan->plan_description !!}
        </div>
        {{--<ul class="list-unstyled plan-features">
            <li>Email preview on air</li>
            <li>Spam testing and blocking</li>
            <li>50 GB Space</li>
            <li>100 user accounts</li>
            <li>Free support for two years</li>
            <li>Free upgrade for two year</li>
        </ul>--}}
    </div>

