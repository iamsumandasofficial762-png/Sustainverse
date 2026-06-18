<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; color: #222; line-height: 1.5;">
    <h2>New Contact Form Submission</h2>

    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone ?: 'Not provided' }}</p>
    <p><strong>Submitted:</strong> {{ optional($contact->created_at)->format('d M Y, h:i A') }}</p>

    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($contact->message)) !!}</p>
</body>
</html>
