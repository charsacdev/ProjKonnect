<x-mail::message>
    <x-slot name="header">
        Your Course Submission is Under Review on ProjKonnect
    </x-slot>

    <b>Dear {{$username}},</b><br>
    Thank you for submitting your course, <b>{{$coursename}}</b>, to ProjKonnect. We have received your submission and our team will now review the content to ensure it meets our quality standards.
    <br><br>
    <h2>What’s Next?</h2>
    Review Process: Our team will carefully review your course to ensure it provides the best learning experience for our community. This process typically takes a few days.
    Notification: You will receive an email notification once the review is complete, informing you whether your course has been approved or if any modifications are needed.
    Dashboard: In the meantime, you can track the status of your submission through your instructor dashboard. Login to your dashboard.
    <br><br>
    <h3>Tips While You Wait</h3>
    <br>
    Engage with the Community: Explore the Q&A section and forums to connect with other ProGuides and learners.
    Prepare for Promotion: Think about how you can promote your course once it's live. Our team will also help in promoting your course across various channels.
    <br><br>
    We appreciate your effort in creating valuable content for our learners. If you have any questions or need assistance during this period, please don’t hesitate to reach out to our support team.

    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
