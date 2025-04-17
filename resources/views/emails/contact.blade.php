@component('mail::message')
# New Contact Form Submission

You have received a new message from your portfolio website:

**Name:** {{ $name }}

**Email:** {{ $email }}

**Subject:** {{ $subject }}

**Message:**
{{ $messageText }}

@component('mail::button', ['url' => config('app.url')])
View Your Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent 