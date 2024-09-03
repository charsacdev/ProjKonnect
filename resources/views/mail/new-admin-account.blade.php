<x-mail::message>
@if($role === 'author')
# Welcome to the ProjKonnect Team: Your New Blogger Role

Dear <b>{{ $username }}</b>,<br>
We are excited to inform you that you have been appointed to a Blogger role on ProjKonnect. Your creativity and passion for sharing knowledge make you an ideal fit for this position.
<h4>Your Role and Responsibilities</h4>
As a Blogger team member, you will have the following responsibilities:
<br>
<ul>
<li>Content Creation: Create engaging and informative blog posts that resonate with our audience.</li>
<li>Research: Conduct research to ensure accuracy and provide valuable insights in your blog posts.</li>
<li>SEO Optimization: Optimize content for search engines to increase visibility and reach.</li>
<li>Community Engagement: Engage with readers through comments and feedback to build a strong community.</li>
<li>Editorial Standards: Adhere to ProjKonnect's editorial standards and guidelines to maintain content quality.</li>
</ul>

<x-mail::button :url="env('URL_LINK') . '/admin-projkonnect/new-password/' . base64_encode($useremail)">
   Click To Reset Account
</x-mail::button>

<h4>Support and Assistance</h4>
If you have any questions or need assistance as you transition into your new role, please do not hesitate to contact us. Our team is here to support you and ensure your success in this new position.

We are confident that you will excel in your new role and help us continue to provide valuable content to our audience.

Welcome aboard, and thank you for your continued dedication to ProjKonnect!

@elseif($role === 'finance')
# Welcome to the ProjKonnect Team: Your New Finance Role

Dear <b>{{ $username }}</b>,<br>
We are pleased to inform you that you have been appointed to a Finance role on ProjKonnect. Your financial acumen and attention to detail make you an excellent addition to our team.
<h4>Your Role and Responsibilities</h4>
As a Finance team member, you will have the following responsibilities:
<br>
<ul>
<li>Financial Management: Oversee and manage the financial operations of ProjKonnect, including budgeting, forecasting, and financial reporting.</li>
<li>Transaction Oversight: Monitor and verify all transactions to ensure accuracy and compliance with financial policies.</li>
<li>Billing and Invoicing: Handle billing processes, invoicing, and payment collection.</li>
<li>Financial Analysis: Conduct financial analysis to support decision-making and strategic planning.</li>
<li>Compliance: Ensure compliance with relevant financial regulations and standards.</li>
</ul>

<x-mail::button :url="env('URL_LINK') . '/admin-projkonnect/new-password/' . base64_encode($useremail)">
   Click To Reset Account
</x-mail::button>

<h4>Support and Assistance</h4>
If you have any questions or need assistance as you transition into your new role, please do not hesitate to contact us. Our team is here to support you and ensure your success in this new position.

We are confident that you will excel in your new role and help us continue to maintain the financial health of ProjKonnect.

Welcome aboard, and thank you for your continued dedication to ProjKonnect!

@else
# Welcome to the ProjKonnect Team: Your New Administrative Role

Dear <b>{{ $username }}</b>,<br>
We are delighted to inform you that you have been appointed to an Administrative role on ProjKonnect. Your dedication and expertise make you a perfect fit for this position.
<h4>Your Role and Responsibilities</h4>
As an Administrative team member, you will have the following responsibilities:
<br>
<ul>
<li>User Management: Monitor and manage user accounts, including handling user queries and resolving issues.</li>
<li>Content Moderation: Ensure that all content posted on the platform adheres to our community guidelines and standards.</li>
<li>Platform Maintenance: Assist in maintaining the integrity and functionality of the platform, reporting any technical issues to our development team.</li>
<li>Support and Training: Provide support to users and other team members, and help onboard new admins as necessary.</li>
<li>Policy Enforcement: Enforce ProjKonnect's policies and terms of service to maintain a safe and productive environment for all users.</li>
</ul>

<x-mail::button :url="env('URL_LINK') . '/admin-projkonnect/new-password/' . base64_encode($useremail)">
   Click To Reset Account
</x-mail::button>

<h4>Support and Assistance</h4>
If you have any questions or need assistance as you transition into your new role, please do not hesitate to contact us. Our team is here to support you and ensure your success in this new position.

We are confident that you will excel in your new role and help us continue to provide a high-quality experience for all our users.

Welcome aboard, and thank you for your continued dedication to ProjKonnect!

@endif

Thanks,<br>
The {{ config('app.name') }} Team
</x-mail::message>
