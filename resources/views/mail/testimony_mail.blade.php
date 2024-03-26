@component('mail::message')

    Hello,<br>
    <br>
    This message is from the website Testimony form. <br>
    <br>
    Please find the details of the form below:<br>
    <br>
    <b>Name:</b> {{ $data['name'] }},<br>
    <br>
    <b>Contact:</b> {{ $data['contact'] }},<br>
    <br>
    <b>Testimony:</b> {{ $data['message'] }}<br>

@endcomponent
