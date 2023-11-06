@extends('layouts.user')

@section('content')
    {{--dashboard--}}
    <div class="relative lg:ml-64 p-8">
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
        @endphp
        <div class="px-4 pt-6">
            <h2 class="title text-3xl font-bold ot ld">Payment Result</h2>
            <div class="rr tf ot ld">
                <div class="i_ iq py-10">
                    <div class="py-4 text-2xl font-bold text-white">{{ $response }}</div>
                    <div class="text-lg text-white">{{ $message }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
