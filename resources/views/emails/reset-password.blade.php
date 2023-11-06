@component('mail::message')
    <h1>Hello,</h1>
    <p>You are receiving this email because we received a password reset request for your account.<br>
        <a style="    box-sizing: border-box;
    font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
    border-radius: 4px;
    color: #fff;
    display: inline-block;
    overflow: hidden;
    text-decoration: none;
    background-color: #2d3748;
    border-bottom: 8px solid #2d3748;
    border-left: 18px solid #2d3748;
    border-right: 18px solid #2d3748;
    border-top: 8px solid #2d3748; margin-top: 20px;" href="{{$link}}">Reset Password</a>
        <p>If you did not request a password reset, no further action is required.</p>
    Regards,<br>
    {{ config('app.name') }}
@endcomponent
