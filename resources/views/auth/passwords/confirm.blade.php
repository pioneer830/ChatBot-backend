@extends('layouts.app')

@section('content')
    <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
        <a href="#" class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
            <img src="{{asset('assets/images/fav.png')}}" class="h-30 mr-4" alt="ProspectPal Logo">
        </a>
            <div class="card">
                <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
                    <div class="p-6 sm:p-8 lg:p-16 space-y-8">
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                         Confirm Password
                        </h2>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}" class="mt-8 space-y-6">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="text-sm font-medium text-gray-900 block mb-2">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="text-white bg-[#152B57] hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
