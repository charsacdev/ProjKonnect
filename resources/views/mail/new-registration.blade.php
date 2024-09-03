<x-mail::message>
    <x-slot name="header">
        Welcome to Projkonnect, {{ $name }}!
    </x-slot>

       <b>Hello {{ $name }}</b><br> We're thrilled to welcome you to Projkonnect, 
        your ultimate platform for project collaboration and networking. 
        Whether you're a seasoned professional or just starting out, 
        Projkonnect is here to help you connect, collaborate, and succeed in your projects. 
        With a vibrant community of like-minded individuals and powerful project management tools at your fingertips, you're on your way to unlocking endless possibilities. 
        Let's make your project dreams a reality, together.
        Looking forward to seeing you thrive on Projkonnect!<br>
        <a href="{{env('URL_LINK')}}/verify-email-success/{{base64_encode($email)}}" target="_blank">
            <button style="width:100%;height:50px;background-color:#7E3DC6;color:#fff;border:0px;border-radius:9px;margin:30px 0px;padding:10px 7px;font-weight:bold;font-size:20px">
                Verify
            </button>
        </a>
  
    <x-slot name="footer">
        Best regards,<br>
        {{ config('app.name') }}
    </x-slot>
</x-mail::message>
