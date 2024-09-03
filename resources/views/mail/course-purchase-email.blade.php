<x-mail::message>
    <x-slot name="header">
        Confirmation of Your Course Purchase on ProjKonnect
    </x-slot>

    <b>Dear {{$username}},</b><br>
    Thank you for your purchase! We are excited to confirm that you have successfully purchased the course on ProjKonnect.
    <h2>Course Details</h2>
    <b>Course Title:</b> {{$title}}<br>
    <b>Description:</b><br>
    {{$description}}<br>
    <b>Price Paid:</b> ${{$price}}<br>
    <b>Purchase Date:</b> {{$date}}<br>
    <h3>Next Steps</h3>
    <p>You can start accessing your course materials by logging into your ProjKonnect dashboard. Your course will be available under the "My Courses" section.</p>
    <h3>Accessing Your Course</h3>
    Log in to your ProjKonnect account to start learning:
    <br>
    If you have any questions or need assistance with accessing your course, please don’t hesitate to contact our support team. We are here to help!

    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
