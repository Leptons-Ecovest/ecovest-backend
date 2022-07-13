@component('mail::message')

<div style="text-align: center" class="c ">
    
    <img src="https://leptonsmulticoncept.com/wp-content/uploads/fbrfg/apple-touch-icon.png" class="logo" style="text-align: center" alt="">

</div>

<h3> Hello {{$data['name']}}, </h3>

<h3>
   Your payment plan for {{$data['project_title']}} has been created successfully.
</h3>

<h3>Click below to login and view payment schedules</h3>

@component('mail::button', ['url' => 'https://app.leptonsecovest.com/#/verify/'.{{$data['otp']}}])
Proceed to Login
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