<x-mail::message>
    <x-slot name="header">
        New Course Submission Pending Verification
    </x-slot>

    <b>Dear Admin,</b><br>
    A new course titled <b>{{$coursename}}</b> has been submitted by {{$username}} and is pending your verification.
    <br><br>
    <h2>Course Details</h2>
    <b>Course Name:</b> {{$coursename}}<br>
    <b>Submitted By:</b> {{$username}}<br>
    <b>Submission Date:</b> {{Carbon\Carbon::now()->format('jS F Y')}}<br>
    <br>
    Please review the course content to ensure it meets our quality standards and approve or provide feedback for necessary modifications.
    <br><br>
    <h3>Next Steps</h3>
    Review Course: Access the submitted course materials through the admin dashboard.
    Verify Content: Ensure the course content is accurate, up-to-date, and valuable for our learners.
    Approve or Provide Feedback: Approve the course if it meets our standards, or provide feedback to the ProGuide for any required changes.
    <br><br>
    
    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
