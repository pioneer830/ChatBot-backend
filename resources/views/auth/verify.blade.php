@extends('layouts.app')

@section('content')
    <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
        <a href="#" class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
            <img src="{{asset('assets/images/fav.png')}}" class="h-30 mr-4" alt="ProspectPal Logo">
        </a>


        <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
            <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                 Verify your email address
                </h2>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}" class="text-white bg-[#152B57] hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
