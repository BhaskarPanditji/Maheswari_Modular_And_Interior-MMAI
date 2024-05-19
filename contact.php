<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the message field is empty (assuming spam bots fill out all fields)
    if (!empty($_POST['message'])) {
        // If the message field is not empty, it's likely a spam bot, so ignore the submission
        echo "Oops! Something went wrong and we couldn't send your message.";
        exit; // Stop further execution
    }

    // Get the form fields
    $name = $_POST['name'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $hear = $_POST['hear'];
    $message = $_POST['message'];
    
    // Create the email message
    $email_message = "Name: $name\n";
    $email_message .= "City: $city\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone Number: $number\n";
    $email_message .= "Service Required: $hear\n";
    $email_message .= "Message: $message\n";

    // Send the email
    $to = "gk788293@gmail.com"; // Change this to your actual email address
    $subject = "New Comment from Website";
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email\n";
    
    // Send the email using mail() function
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Thank you for your comment. We will get back to you soon!";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
}
?>
