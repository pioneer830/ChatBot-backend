@extends('layouts.user')

@section('content')
    {{--dashboard--}}
    <div class="relative lg:ml-64 p-8">
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
        @endphp
        <div class="px-4 pt-6">
            <h2 class="title text-3xl font-bold ot ld">Customize</h2>
            @include("share._coming")
        </div>
    </div>
@endsection
