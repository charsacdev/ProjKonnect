<x-mail::message>
    <x-slot name="header">
        New Course Purchase Notification on ProjKonnect
    </x-slot>

    <b>Dear {{$proguideUsername}},</b><br>
    We are pleased to inform you that a purchase has been made for your course on ProjKonnect.
    <h2>Purchase Details</h2>
    <b>Course Title:</b> {{$title}}<br>
    <b>Student Name:</b> {{$studentName}}<br>
    <b>Price Paid:</b> ${{$price}}<br>
    <b>Purchase Date:</b> {{$date}}<br>
    <h3>What’s Next?</h3>
    The student now has access to your course materials. You can track their progress and engage with them through your instructor dashboard.
    <h3>Access Your Dashboard</h3>
    Log in to your ProjKonnect instructor dashboard to view more details and manage your course:
    <br>
    If you have any questions or need assistance, please don’t hesitate to contact our support team. Thank you for contributing to the ProjKonnect learning community!

    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
