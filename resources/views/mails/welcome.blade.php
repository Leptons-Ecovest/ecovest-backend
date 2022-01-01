@component('mail::message')

<h3></h3>

<p>
    Hi, {{ $data['name'] }} <br>
    Congratulations. Welcome to Medicsetal. <br>

</p>

<p>
    <u>Follow the steps below to get started</u>
</p>

<ol>
    <li>Update your profile</li>
    <li>Subscribe to a package</li>
    <li>Share your affiliate link</li>
</ol>

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent