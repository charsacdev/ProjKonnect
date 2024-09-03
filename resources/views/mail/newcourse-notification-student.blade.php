<x-mail::message>
    <x-slot name="header">
        Exciting New Course Just for You!
    </x-slot>

    <b>Dear {{$username}},</b><br>
      We are thrilled to introduce a brand new course that we believe aligns perfectly with your interests: <b>{{$coursename}}</b>.
    <br><br>
    <h2>Why You'll Love This Course</h2>
    <p>
        Our expert instructors have crafted this course to help you deepen your knowledge and skills in {{$coursename}}. Whether you're looking to advance in your career or explore a new passion, this course offers:
    </p>
    <ul>
        <li><b>Comprehensive Content:</b> Learn from in-depth modules designed by industry experts.</li>
        <li><b>Interactive Learning:</b> Engage with hands-on activities, discussions, and real-world applications.</li>
        <li><b>Flexible Schedule:</b> Study at your own pace, whenever and wherever it suits you.</li>
    </ul>
    <h3>Course Details</h3>
    <b>Instructor:</b> {{$proguideName}}<br>
    <b>Course Name:</b> {{$coursename}}<br>
    <b>Publish Date:</b> {{ Carbon\Carbon::now()->format('jS F Y') }}<br>
    <br>
    <p>
        If you have any questions or need assistance, feel free to reach out to our support team at any time.
    </p>
    
    <x-slot name="footer">
        Best regards,<br>
        The {{ config('app.name') }} Team
    </x-slot>
</x-mail::message>
