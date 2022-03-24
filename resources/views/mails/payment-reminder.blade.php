@component('mail::message')

<div class="c">
<img src="https://leptonsmulticoncept.com/wp-content/uploads/fbrfg/apple-touch-icon.png" class="logo" style="text-align: center" alt="">

</div>
<h3> Hello {{$data['name']}}, </h3>

<p>Please find below an invoice for your next due paym</p>

<table>
    <tr>
        <td>Project Title: </td>
        <td>{{$data['title']}}</td>
    </tr>
    <tr>
        <td>Project Location: </td>
        <td>{{$data['location']}}</td>
    </tr>
    <tr>
        <td>Project Description: </td>
        <td>{{$data['description']}}</td>
    </tr>
    <tr>
        <td>Total Amount: </td>
        <td>N {{$data['total_amount']}} M</td>
    </tr>

    <tr>
        <td>Payment Date: </td>
        <td>{{$data['payment_date']}}</td>
    </tr>

    <tr>
        <td>Amount to be paid: </td>
        <td>N {{$data['expected_amount']}} M</td>
    </tr>

    <tr>
        <td>Due Date: </td>
        <td>{{'due_date'}}</td>
    </tr>  

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