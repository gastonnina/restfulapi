@component('mail::message')
# Hello {{$user->name}}

Thank You for creating an account. Please verify your email using this button:

@component('mail::button', ['url' => route('verify', $user->verification_token)])
Verify account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
