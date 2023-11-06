@extends('layouts.user')

@section('content')
    {{--dashboard--}}
    <div class="relative lg:ml-64 p-8">
        @php
            $user = \Illuminate\Support\Facades\Auth::user();
        @endphp
        <div class="px-4 pt-6">
            <h2 class="title text-3xl font-bold ot ld">Payment</h2>
            <div class="rr tf ot ld">
                <div class="i_ iq py-10">
                    @include("share._payment", ["secret_id" => $secret_id, "plan" => $plan])
                </div>
{{--                @include('share.flash-message')--}}
{{--                <form action="{{ route('subscription') }}" method="POST" class="i_ iq py-10">--}}
{{--                    @csrf--}}
{{--                    <div >--}}
{{--                        <label for="card-element">--}}
{{--                            Credit or debit card--}}
{{--                        </label>--}}
{{--                        <div id="card-element" class="py-8 bg-gray-300 text-white my-4 rounded px-4">--}}
{{--                            <!-- A Stripe Element will be inserted here. -->--}}
{{--                        </div>--}}

{{--                        <!-- Used to display form errors. -->--}}
{{--                        <div id="card-errors" role="alert"></div>--}}
{{--                    </div>--}}

{{--                    <button class="rounded py-2 px-4 bg-blue-600 text-white">Submit Payment</button>--}}
{{--                </form>--}}
{{--                <!-- Include the Stripe JS library. -->--}}
{{--                <script src="https://js.stripe.com/v3/"></script>--}}
{{--                <!-- Create a Stripe client. -->--}}
{{--                <script>--}}
{{--                    var stripe = Stripe('{{ env("STRIPE_KEY") }}');--}}
{{--                    var elements = stripe.elements();--}}

{{--                    // Create a Stripe Card Element and mount it to the card-element div.--}}
{{--                    var cardElement = elements.create('card');--}}
{{--                    cardElement.mount('#card-element');--}}
{{--                </script>--}}
            </div>
        </div>
    </div>
@endsection
