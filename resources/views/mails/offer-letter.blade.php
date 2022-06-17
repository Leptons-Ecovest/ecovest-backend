@component('mail::message')

<p>HELLO {{$data['name']}}</p>
<p>Welcome On Board!</p> 
<p>Thank you for joining the Leptons Ecovest Family. We are glad to see that your home meets you</p>
<p>You are almost done!</p>
<p>Confirm your email</p>
<p>Click this link</p>
<p>Sign your offer letter</p>
<p>Kindly</p>
<ul>
    <li>Read</li>
    <li>Print</li>
    <li>Sign</li>
    <li>Scan and reply this email.</li>
</ul>
<p>Download Project Brochures</p>
<p>This contains your payment plan, project description, project detail and many more.</p>
<ul>
    <li>Facebook</li>
    <li>Linkedin</li>
    <li>Instagram</li>
</ul>

@component('mail::button', ['url' => config('app.url').'attachments/attachment2.pdf'])
Download Floor Plans
@endcomponent

@component('mail::button', ['url' => config('app.url').'attachments/attachment1.pdf'])
Download Design
@endcomponent

<p>info@leptonsmulticoncept.net | +=234 701 111 1629</p>
 
<p>2021 Leptons Multiconcept Ltd. All Rights Reserved.</p>

<p>4, Kolo S Close, Kado Estate, Abuja.</p>

<p>You received this email from Leptons Multiconcept Ltd when you indicated interest in a Leptons Project</p>

@endcomponent