@extends('layouts.app')

@section('content')
    <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0 min-h-full b im">
        <a href="#" class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
            <img src="{{asset('assets/images/fav.png')}}" class="h-30 mr-4" alt="ProspectPal Logo">
        </a>
        <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
            <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    Reset Password
                </h2>
                    <form method="POST" action="{{ route('password.update') }}" class="mt-8 space-y-6">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="text-sm font-medium text-gray-900 block mb-2">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="background-color: rgb(21 43 87 / var(--tw-bg-opacity));" type="submit" class="text-white bg-[#152B57] hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
