@component('mail::message')

    Hello,<br>
    <br>
    This message is from the website contact form. <br>
    <br>
    Please find the details of the form below:<br>
    <br>
    <b>Name:</b> {{ $data['name'] }},<br>
    <br>
    <b>Email:</b> {{ $data['email'] }},<br>
    <br>
    <b>Subject:</b> {{ $data['subject'] }},<br>
    <br>
    <b>Message:</b> {{ $data['message'] }}<br>

@endcomponent
