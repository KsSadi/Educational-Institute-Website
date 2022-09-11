@component('mail::message')
    # Password Recovery

    You are receiving this email because we received a password reset request for your account.

    Reset Password :  {{$url}}


    This password reset link will expire in 60 minutes.

    If you did not request a password reset, no further action is required.

    Regards,
    {{ config('app.name') }}


    If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
    {{$url}}

@endcomponent


