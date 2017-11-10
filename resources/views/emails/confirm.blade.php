@component('mail::message')
# Hello {{$user->name}}

You changed your email, so we need to verify this. Please use the button below:

@component('mail::button', ['url' => route('verify', $user->verification_token)])
Verify account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
