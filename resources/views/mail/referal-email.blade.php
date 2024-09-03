<x-mail::message>
# New Referral Notification

Dear <b>{{ $name }}</b>,<br>
We are excited to inform you that you have successfully referred a new user to our platform.

- **Referred Person's Name:** {{ $refname }}

Thank you for referring <b>{{ $refname }}</b> to our service. We greatly appreciate your support and trust in our platform.

If you have any questions or need further assistance, please feel free to contact our support team.

Best regards,<br>
The {{ config('app.name') }} Team
</x-mail::message>
