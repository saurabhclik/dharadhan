<?php

    $to = "manoj@racksoftwares.com";

    $from     = $_REQUEST['email'] ?? '';
    $fname    = $_REQUEST['firstname'] ?? '';
    $lname    = $_REQUEST['lastname'] ?? '';
    $message  = $_REQUEST['message'] ?? '';

    if (!$to) {
        die("ADMIN_EMAIL is not configured.");
    }

    // Fix headers
    $headers  = "From: {$from}\r\n";
    $headers .= "Reply-To: {$from}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $subject = "Contact Form - FindHouses Site";

    // Fields mapping
    $fields = [
        "firstname" => "First Name",
        "lastname"  => "Last Name",
        "email"     => "Email",
        "message"   => "Message"
    ];

    // Build email body
    $body = "Here is what was sent:\n\n";

    foreach ($fields as $key => $label) {
        $value = $_REQUEST[$key] ?? '';
        $body .= sprintf("%20s: %s\n\n", $label, $value);
    }

    // Send email
    $send = mail($to, $subject, $body, $headers);

    if ($send) {
        echo "Mail sent successfully.";
    } else {
        echo "Mail failed to send.";
    }

?>
