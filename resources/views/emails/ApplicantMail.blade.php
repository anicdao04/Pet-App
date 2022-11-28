@component('mail::message')

Dear, <b>{{ $details['applicant'] }}</b> <br><br>


We're happy to let you know that we are processing your application to adopt <b>{{ $details['pet'] }}</b>.<br><br>


Best regards,<br>
Noah's Ark


@endcomponent