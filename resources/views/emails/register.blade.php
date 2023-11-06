@component('mail::message')
    <h1>Hello {{$name}},</h1>
    <p>Thank you for completing your registration with {{ config('app.name') }}.
        This email serves as a confirmation that your account is created
        and that you are officially a part of the {{ config('app.name') }} family.</p>
        Enjoy!<br>
    Regards,<br>
    {{ config('app.name') }}
@endcomponent
