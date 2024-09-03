<x-mail::message>
    <x-slot name="header">
       ProjKonnect Plan Purchase Confirmation
    </x-slot>

    <b>Dear {{$username}},</b><br>
    Thank you for purchasing the <b>{{$plantype}}</b> plan on our platform. We are excited to have you on board and look forward to supporting your learning journey.
    <br>
    <h2>Plan Details</h2>
    <b>Plan Name:</b> {{$plantype}}<br>
    <b>Price Paid:</b> ${{$planprice}}<br>
    <b>Duration:</b> {{$planduration}}Days<br>
    <b>Start Date:</b> {{ Carbon\Carbon::now()->format('jS F Y') }}<br>
    <b>Expiration Date:</b> {{ Carbon\Carbon::now()->addDays($planduration)->format('jS F Y') }}<br>
    <br>
    Your plan is now active, and you can start enjoying all the benefits that come with it. Make sure to explore the resources and tools available to you.
    <br>
    <h3>Next Steps</h3>
    To get started, simply log in to your dashboard where you can access all the materials and features included in your plan. We recommend taking some time to familiarize yourself with the content and setting up a study schedule that works best for you.
    <br><br>
    If you have any questions or need assistance, our support team is here to help. Feel free to reach out to us at any time.

    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
