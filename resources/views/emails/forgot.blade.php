@component('mail::message')
# Forgot Password
Hello {{ $user->name }},

<p> You are receiving this email because we received a password reset request for your account.</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Click here to reset your password
@endcomponent

<p> In case you have any issues Recover your password, please contact us.</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent