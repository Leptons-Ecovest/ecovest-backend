@component('mail::message')



<h1>
    Hi, {{ $data['name'] }}
</h1>

<h1>
    Congratulations. Welcome to Leptons Ecovest.
</h1>

<h1>
    Email:
</h1>
    
<h1>
    {{$data['email']}}
</h1>

<h1>
    Password:
</h1>

<h1>
    {{$data['otp']}}
</h1>

    




{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent