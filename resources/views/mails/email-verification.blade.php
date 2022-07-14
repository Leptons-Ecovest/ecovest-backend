@component('mail::message')

<h1> Hello {{$data['name']}}, </h1>

<h1>
    Welcome to Leptons Ecovest, use the link below to verify your email.
</h1>
  
    
@component('mail::button', ['url' => 'https://app.leptonsecovest.com/#/verify/'.$data['otp']])
Verify Email
@endcomponent

<h1>
    If you have any complaints please contact our support.
</h1>
    

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent