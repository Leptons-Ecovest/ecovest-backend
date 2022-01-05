@component('mail::message')

<h3> Hello {{$data['name']}}, </h3>

<p>
   Your payment plan for {{$data['project_title']}} has been created successfully. Login to your dashboard to view your payment schedule.
</p>
  
    


<p>
    If you have any complaints please contact our support.
</p>
    

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent