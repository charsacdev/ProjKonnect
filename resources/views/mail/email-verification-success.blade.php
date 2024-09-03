<x-mail::message>
    <x-slot name="header">
        Welcome to Projkonnect, {{ $name }}!
    </x-slot>

       <b>Hello {{ $name }}</b><br> Thank you for verifying your account with ProjKonnect! We're thrilled to have you on board. 
        If you have any questions or need assistance, don't hesitate to reach out.
        Welcome to ProjKonnect!
        Looking forward to seeing you thrive on Projkonnect!<br>
  
    <x-slot name="footer">
        Best regards,<br>
        {{ config('app.name') }}
    </x-slot>
</x-mail::message>
