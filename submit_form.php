<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Recipient email
    $to = "elitejohan526@gmail.com";
    
    // Subject of the email
    $subject = "New Contact Form Submission from $name";

    // Construct the email content
    $email_content = "You have received a new message from your website contact form.\n\n";
    $email_content .= "Here are the details:\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n";

    // Construct the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // If mail is sent successfully, redirect to a thank you page
        echo "Message sent successfully!";
    } else {
        // If mail sending failed, show an error
        echo "Oops! Something went wrong, please try again later.";
    }
} else {
    // Redirect to the contact form if accessed directly
    header("Location: contact.html");
    exit;
}
?>
