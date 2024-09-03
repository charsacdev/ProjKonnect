<x-mail::message>
# Withdrawal Request Successfully Received

Dear <b>{{ $name }}</b>,<br>
We have successfully received your withdrawal request. Below are the details of your request:

- **Requested Amount:** ${{ number_format($amount, 2) }}
- **Request Date:** {{Carbon\Carbon::now()->format('jS F Y')}}
- **Account Holder Name:** {{ $name }}
- **Payment Details:** {{ $bankdetails }}
- **Current Balance:** ${{ $balance}}

Your request is being processed, and the funds will be transferred to your account shortly.

If you have any questions or need further assistance, please feel free to contact our support team.

Thank you for using our service.

Best regards,<br>
The {{ config('app.name') }} Team
</x-mail::message>
