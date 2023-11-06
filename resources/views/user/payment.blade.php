@extends('layouts.user')
@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp

@section('content')
   {{-- //error--}}
   @if(session()->has('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{session()->get('error')}}
        </div>
    @endif
    {{--dashboard--}}
    {{--<div class="relative lg:ml-64 p-8">
        <div class="px-4 pt-6">
            <h2 class="title text-3xl font-bold ot ld">Payment</h2>
            <div class="rr tf ot ld">
                <div class="i_ iq py-10">
                    <div class="grid md:grid-cols-2 grid-cols-1 grid-flow-col gap-4">
                        <div class="">

                            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                                <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{$plan->name ?? ''}}</h5>
                                <div class="flex items-baseline text-gray-900 dark:text-white">
                                    <span class="text-3xl font-semibold">$</span>
                                    <span class="text-5xl font-extrabold tracking-tight">{{$plan->amount ?? '0'}}</span>
                                    <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/{{$plan->plan_interval ?? ''}}</span>
                                </div>
                                <!-- List -->
                                <div class="form-control" style="color: #000;">
                                    <p>{{$plan->plan_option ?? ''}}</p>
                                    <div class="mt-3 mb-3 tick-li">
                                        {!! $plan->plan_description ?? '' !!}
                                    </div>
                                </div>

                                <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose plan</button>
                            </div>

                        </div>
                        <div class="">
                            <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                                --}}{{--<form class="space-y-6" action="#">
                                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Card information</h5>
                                    <div>
                                        <label for="card-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Card number</label>
                                        <input type="number" name="card-number" id="card-number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="card number" required>
                                    </div>
                                    <div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <div>
                                        <label for="exp-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expiry date</label>
                                        <input type="date" name="exp-date" id="exp-date" placeholder="Expiry date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <div>
                                        <label for="cvv" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CVV</label>
                                        <input type="number" name="cvv" id="cvv" placeholder="CVV" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-start">

                                        </div>
                                    </div>
                                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit payment</button>
                                </form>--}}{{--

                                @include('share._payment')

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>--}}
    <div id="monthlyPlanItems" class="row pricing-table">
        <div class="col-md-6 col-xl-4 grid-margin stretch-card pricing-card">
            @include("share._plan", [
                "plan" => $plan,
                "duration"=> $plan->plan_interval,
                "active" => ((isset($last_sub) && $last_sub->plan_id == $plan->id) || (!isset($last_sub) && $user != null && $plan->amount == 0) || ($user == null && $key == 1)),
                "user" => $user
        ])

        </div>
        <div class="col-md-6">
            @include('share._payment')
        </div>
    </div>

@endsection

