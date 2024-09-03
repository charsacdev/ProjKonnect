<x-mail::message>
    <x-slot name="header">
        Welcome to Password Reset!
    </x-slot>

       <b>Hello {{ $username }}</b><br>We are sending your this message because your requested to reset your password in your account
       click the link below to proceed<br>
        <a href="{{env('URL_LINK')}}/newpassword/{{base64_encode($email)}}/{{base64_encode($auth)}}" target="_blank">
            <button style="width:100%;height:50px;background-color:#7E3DC6;color:#fff;border:0px;border-radius:9px;margin:30px 0px;padding:10px 7px;font-weight:bold;font-size:20px">
                Reset
            </button>
        </a>
  
    <x-slot name="footer">
        Best regards,<br>
        {{ config('app.name') }}
    </x-slot>
</x-mail::message>
