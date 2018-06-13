@component('mail::message')
# Welcome to Droghers, {{ $user->name }}

Your registered email-id is {{ $user->email }} , Please click on the below link to verify your droghers account

@component('mail::button', ['url' => url('user/verify', $user->verifyUser->token)])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
