@component('mail::message')

<h3></h3>

<p>
    Hi, {{ $data['name'] }} <br>
    Congratulations. Welcome to Leptons Ecovest. <br>

</p>

<p>
    
    <h6>Email:</h6>

    <h6>{{$data['email']}}</h6>

    <h6>Password:</h6>

    <h6>{{$data['otp']}}</h6>
    
</p>



{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent