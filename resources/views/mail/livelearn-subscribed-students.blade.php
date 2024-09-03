<x-mail::message>
    <x-slot name="header">
        Upcoming Live Learning Session on ProjKonnect
    </x-slot>

    <b>Dear {{$username}},</b><br>
    We are excited to inform you about an upcoming live learning session on ProjKonnect that you won't want to miss.
    <h2>Course Details</h2>
    <b>Title:</b> {{$title}}<br>
    <b>Description:</b><br>
          {{$description}}
        <br>
        <b>Price:</b> ${{$price}}<br>
        <b>Date:</b> {{$date}}<br>
    <br>
    Make sure to mark your calendar and join us for this insightful session. You can register for the session by logging into your dashboard
    <br><br>
    We look forward to seeing you there and helping you advance your learning journey with ProjKonnect. If you have any questions or need further information, please don't hesitate to contact our support team.
    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
