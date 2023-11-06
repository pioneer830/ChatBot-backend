@extends('layouts.user')

@section('content')
    <div class="page-header">
        <h3 class="page-title">Plans</h3>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container text-center">
                        <div class="switch-wrapper">
                            <input id="monthly" type="radio" name="switch" checked>
                            <input id="yearly" type="radio" name="switch">
                            <label for="monthly">Monthly</label>
                            <label for="yearly">Yearly 30% OFF</label>
                            <span class="highlighter"></span>
                        </div>
                        @include("share.plans", ["show_title" => false])
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--dashboard--}}
    {{--<div class="relative lg:ml-64 p-3">
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
        @endphp
        <div class="px-4 pt-6">
            <div>
                @include("share.plans", ["show_title" => false])
            </div>
        </div>
    </div>

    <style>
        .cp.om {
            padding-bottom: 0;
        }
    </style>--}}
@endsection

@push('css')

@endpush
