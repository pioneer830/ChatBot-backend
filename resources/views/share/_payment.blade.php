<div class="card">
    <div class="card-body">
        <h4 class="card-title">Credit or debit card</h4>
        <form action="{{route('user.payment')}}" method="post" id="payment-form">
            @csrf
            <input type="hidden" name="plan_id" value="{{$plan->id ?? '0'}}">
            <label for="card-element mb-8">
            </label>
            <div id="card-element" class="mb-2">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>
            <button type="submit" class="btn btn-success mr-2">Pay Now</button>
        </form>
    </div>
</div>

@push('css')
<style>
.StripeElement {
    box-sizing: border-box;
    height: 40px;
    padding: 10px 12px;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
}
.StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
    border-color: #fa755a;
}
.StripeElement--webkit-autofill {
    background-color: white !important;
    width: 100%;
}
</style>
@endpush

@push('script')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{config('app.STRIPE_KEY')}}");
    const elements = stripe.elements();

    const style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
        },
    };

    // Create an instance of the card Element.
    const card = elements.create('card', {style});
    console.log('ssss',card);
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');


    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {token, error} = await stripe.createToken(card);

        if (error) {
            // Inform the customer that there was an error.
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(token);
        }
    });

    const stripeTokenHandler = (token) => {
        // Insert the token ID into the form so it gets submitted to the server
        const form = document.getElementById('payment-form');
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

</script>
@endpush
