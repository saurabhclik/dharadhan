<!doctype html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <h3>New Contact Form Message</h3>

    <p><strong>First Name:</strong> {{ $firstname }}</p>
    <p><strong>Last Name:</strong> {{ $lastname }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>

    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($content)) !!}</p>

</body>

</html>
