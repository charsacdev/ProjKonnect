<x-mail::message>
    <x-slot name="header">
        Congratulations! Your Course Has Been Approved on ProjKonnect
    </x-slot>
     
        <b>Dear {{$name}}</b><br>,
        Thank you for submitting your course, <b>{{$coursename}}</b>, to ProjKonnect. We appreciate the time and effort you have invested in creating your course.
        <br>
        After a thorough review, we regret to inform you that your course has not met the criteria for approval at this time. Our goal is to ensure that all courses on ProjKonnect meet our high standards for quality and content.
        <br><br>
        <h3>Reasons for Decline</h3>
        <br>
         We cheerish your effort but your course is not inline with our community standards
        <br>
        hank you for your understanding and your commitment to providing high-quality education on ProjKonnect. We look forward to seeing your revised course soon.

    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
