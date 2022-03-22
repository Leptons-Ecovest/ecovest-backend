@component('mail::message')

<div class="c">
<img src="https://leptonsmulticoncept.com/wp-content/uploads/fbrfg/apple-touch-icon.png" class="logo" style="text-align: center" alt="">

</div>
<h3> Hello {{$data['name']}}, </h3>

<p>
   Your payment plan for {{$data['project_title']}} has been created successfully. <a href="https://app.leptonsmulticoncept.com/#/login">Login to your dashboard</a>  to view your payment schedule.
</p>




<table class="table" >
    <thead>
        <tr>
            <th>#</th>
            <th>Payment Due Date</th>
            <th>Amount</th>
        </tr>
    </thead>
    @foreach ($payments as $payment)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$payment['payment_due_date']}}</td>
        <td>{{$payment['expected_amount']}}</td>
    </tr>
    @endforeach
    
</table> 
  
    


<p>
    If you have any complaints please contact our support.
</p>
    

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent