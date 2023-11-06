@extends('layouts.user')

@section('content')

    <link rel="stylesheet" href="{{asset('assets/css/table.css')}}">
    <section class="b">
        <div class="relative lg:ml-64 p-8">
        <div class="px-4 pt-6">
            <div class="col-md-12 mx-auto" style="float: right; margin-bottom: 5px;">
                <a href="{{route('tones.index')}}" class="py-2 px-3 rounded bg-gray-800 text-white">< Back</a>
            </div>
            <h2 class="title text-3xl font-bold ot ld">Tones / <span class="font-sm">Update</span></h2>

            <div class="rr tf ot ld">
                <div class="oo ca i_ iq">
                    <form method="post" action="{{route('tones.update', $user_tone)}}">
                        @csrf
                        @method('PUT')
                        @include('user.tones.form')
                    </form>
                </div>
            </div>

        </div>
    </div>
    </section>
@endsection
