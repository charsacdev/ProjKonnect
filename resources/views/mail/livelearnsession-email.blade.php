<x-mail::message>
    <x-slot name="header">
        Successful Registration and Payment Confirmation for Live Learning Session
    </x-slot>

    <b>Dear {{$username}},</b><br>
    We are thrilled to confirm your successful registration and payment for the upcoming live learning session on ProjKonnect.
    <h2>Session Details</h2>
    <b>Title:</b> {{$title}}<br>
    <b>Description:</b><br>
    {{$description}}<br>
    <b>Price Paid:</b> ${{$price}}<br>
    <b>Date:</b> {{$date}}<br>
    <br>
    You have successfully secured your spot in the session. Make sure to mark your calendar and prepare to gain valuable insights and knowledge.
    <h3>Accessing the Session</h3>
    On the day of the session, you can join by logging into your ProjKonnect dashboard. Further instructions and the session link will be available there.
    <br>
    <br>
    If you have any questions or need further assistance, please don't hesitate to contact our support team. We look forward to seeing you at the session and helping you advance your learning journey with ProjKonnect.

    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
