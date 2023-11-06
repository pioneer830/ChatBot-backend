@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <div class="mx-auto md:h-screen flex flex-col justify-start items-center px-6 pt:mt-0 min-h-full b im">
        <a href="/" class="text-2xl font-semibold flex justify-center pt-8 items-center mb-8 lg:mb-10">
            <img src="{{asset('assets/images/fav.png')}}" class="h-30 mr-4" alt="ProspectPal Logo">
        </a>
        <!-- Card -->
        <div class="y w x k su sc sm as nm v te" aria-hidden="true"></div>
        <!-- Illustration -->
        <div class="y _ rg v te min-h-screen sn" aria-hidden="true">
            <img src="{{asset('assets/images/hero-illustration.svg')}}" class="ri" width="2143" height="737"
                 alt="Hero Illustration">
        </div>
        <div class="sr shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
            <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-300">
                  Reset Password
                </h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-6">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="text-sm font-medium text-gray-300 block mb-2">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="big-button">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
