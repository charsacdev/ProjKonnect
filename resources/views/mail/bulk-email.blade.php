<x-mail::message>
#  A message Notification from Projkonnect

Dear <b>{{$username}}</b>
<br>
{{$answermessage}}

Best regards,<br>
The {{ config('app.name') }} Support Team
</x-mail::message>
