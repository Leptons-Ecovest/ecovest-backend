@component('mail::message')

<h3> Hello {{$data['name']}}, </h3>

<p>
    Welcome to Leptons Ecovest, use the link below to verify your email.
</p>
  
    
@component('mail::button', ['url' => 'https://app.leptonsecovest.com/#/verify/'.{{$data['otp']}}])
Verify Email
@endcomponent

<p>
    If you have any complaints please contact our support.
</p>
    

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent