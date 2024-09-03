<x-mail::message>
    <x-slot name="header">
        Congratulations! Your Course Has Been Approved on ProjKonnect
    </x-slot>

    <b>Dear {{$name}},</b><br>
    We are thrilled to inform you that your course, <b>{{$coursename}}</b>, has been successfully approved and is now live on ProjKonnect!
    <br>
     <h2>What’s Next?</h2>
        Course Page: Your course is now visible to learners. You can view your course page here.
        Promotion: Our team will start promoting your course across various channels to maximize its reach.
        Dashboard: Track enrollments, student progress, and feedback through your instructor dashboard. Login to your dashboard.
        <br><br>
        <h3>Tips for Success</h3>
        <br>
        Engage with Students: Regularly check the Q&A section and forums to engage with your learners.
        Update Content: Keep your course content up-to-date to ensure it remains relevant and valuable.
        Collect Feedback: Encourage students to leave reviews and use their feedback to improve your course.
        <br>
           We believe your course will be a fantastic addition to our platform and provide immense value to our learners. If you have any questions or need assistance, please don’t hesitate to reach out to our support team.
          Thank you for choosing ProjKonnect to share your expertise!

    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
