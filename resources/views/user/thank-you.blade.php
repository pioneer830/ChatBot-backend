@extends('layouts.user')

@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp

@section('content')
    {{--dashboard--}}
    <div class="page-header">
        <h3 class="page-title">Thank You</h3>
    </div>
    <div class="row">
        <div class="col">
            <div class="alert alert-success text-center" role="alert">
                You have successfully purchased {{request('plan') ?? ''}} plan
            </div>
        </div>
    </div>
    {{--<div class="relative lg:ml-64 p-8">

        <div class="px-4 pt-6">
            <h2 class="title text-3xl font-bold ot ld">Thank You</h2>
            <div class="rr tf ot ld">
                <div class="i_ iq py-10">
                    <div class="">
                        <div style="color: #000;" class="w-full bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-4 text-xl text-gray-500 dark:text-gray-400">{{$plan->name ?? ''}}</h5>

                            <h3 class="text-center">You have successfully purchased {{request('plan') ?? ''}} plan</h3>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
--}}
@endsection
