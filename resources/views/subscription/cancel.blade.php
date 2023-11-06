@extends('layouts.user')

@section('content')
{{--<link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
<section class="b">
    <div class="relative lg:ml-64 p-8">

        <div class="px-4 pt-6">
            <div class="col-md-12 mx-auto" style="float: right; margin-bottom: 5px;">
                <a href="{{route('plans')}}" class="py-2 px-3 rounded bg-gray-800 text-white">
                    < Back</a>
            </div>
            <h2 class="title text-3xl font-bold ot ld">Cancel your {{$plan?->name ??  ''}} Plan</h2>

             <div class="grid md:grid-cols-2 grid-cols-1 grid-flow-col gap-4 i_ iq pt-8">
                <div class="cancel-plan">
                    <div class=" max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Manage your plan</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Are you sure you want to cancel your subscription?</p>

                        <form method="POST" action="{{ route('cancelSubscription') }}">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{$plan->id ?? 0}}">
                            <a href="{{route('plans')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upgrade plan</a>
                            <button type="submit" {{isset($plan->plan_id) && $plan->plan_id == 1 ? 'disabled' : ''}} onclick="return confirm('Are you sure you want to cancel this ?');" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel plan</button>
                        </form>
                    </div>
                </div>

                <div class="plan-summary">

                    <div class="w-full max-h-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Plan summary</h5>
                        <p class="text-2xl font-semibold text-xl font-medium text-black">Plan name: {{$plan?->name ?? ''}}</p>
                        <p class="text-2xl font-semibold text-xl font-medium text-black">Price: ${{$plan?->amount ?? 0}}<span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/{{$plan->plan_interval ?? ''}}</span></p>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>--}}

<div class="page-header">
    <h3 class="page-title">Cancel your {{$plan?->name ??  ''}} Plan</h3>
</div>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Manage your plan</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">Are you sure you want to cancel your subscription?</h6>
                                        <p class="text-muted mb-0" style="opacity: 0">Are you sure you want to cancel your subscription?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('cancelSubscription') }}">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{$plan->id ?? 0}}">
                            <a href="{{route('plans')}}" class="btn btn-primary mt-2 p-2">Upgrade Plan</a>
                            <button type="submit" {{isset($plan->plan_id) && $plan->plan_id == 1 ? 'disabled' : ''}} onclick="return confirm('Are you sure you want to cancel this ?');" href="#" class="btn btn-danger mt-2 p-2">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Plan summary</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="preview-list">
                            <div class="preview-item border-bottom">
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">Plan name: {{$plan?->name ??  ''}}</h6>
                                        <p class="text-muted mb-0">Price: ${{$plan?->amount ?? 0}}/{{$plan?->plan_interval}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
