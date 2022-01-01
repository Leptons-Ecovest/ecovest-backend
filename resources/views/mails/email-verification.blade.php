@component('mail::message')

<h3> Hello {{$data['name']}}, </h3>

<p>
    Welcome to Leptons, use the OTP below to verify your email.
</p>
  
    
<h3> {{$data['otp']}} </h3>

<p>
    If you have any complaints please contact our support.
</p>
    

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent