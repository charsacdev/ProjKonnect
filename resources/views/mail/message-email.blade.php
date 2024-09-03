<x-mail::message>
# You Have a New Message

<b>Hi {{$proguideName}}</b>,<br>
You have received a new message from <b>{{ $studenName }}</b>.<br>
You have <b>{{ $messagCount }}+</b> new message(s) waiting for you.<br>

Please check your inbox to read the message(s).

Best regards,<br>
The {{ config('app.name') }} Team
</x-mail::message>
