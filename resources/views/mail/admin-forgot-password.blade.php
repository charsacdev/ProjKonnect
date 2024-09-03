<x-mail::message>
# Projkonnect Admin Password Reset Request

Dear <b>{{ $username }}</b><br>
We received a request to reset your password for your ProjKonnect admin account. If you did not request a password reset, please ignore this email. Otherwise, you can reset your password using the button below.
<x-mail::button :url="env('URL_LINK') . '/admin-projkonnect/new-password/' . base64_encode($email)">
    Click To Reset Account
 </x-mail::button>
This password reset link will expire in 60 minutes.
<br>
If you have any issues or did not request this password reset, please contact our support team.


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
