<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check that data was sent to the mailer.
    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 (bad request) response code and exit.
        $responseCode = 400; // Bad Request
        header("Location: http://sunflowersanitation.com?response=$responseCode");
        exit;
    }

    // Recipient email (replace with your email)
    $recipient = "contact@sunflowersanitation.com";

    // Email subject
    $subject = "New contact from $name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Set a 200 (okay) response code.
        $responseCode = 200;
        header("Location: http://sunflowersanitation.com?response=$responseCode");
    } else {
        // Set a 500 (internal server error) response code.
        $responseCode = 500;
        header("Location: http://sunflowersanitation.com?response=$responseCode");
    }

} else {
    // Not a POST request, set a 403 (forbidden) response code.
    $responseCode = 403;
    header("Location: http://sunflowersanitation.com?response=$responseCode");
}
?>