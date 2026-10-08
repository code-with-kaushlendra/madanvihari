<?php
include('include/conn.php');

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // $service = $_POST['service'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts (name, email, phone, message)
            VALUES ('$name', '$email', '$phone', '$message')";

    $result = mysqli_query($con, $sql);

    // EMAIL
    $to = 'rocksaurabhsharma16@gmail.com';
    $email_subject = 'New Contact Form Submission';

    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n";
    // $email_message .= "Subject: $service\n";
    $email_message .= "Message: $message\n";

    $headers = "From: info@example.com\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    mail($to, $email_subject, $email_message, $headers);

    // SAFE REDIRECT
    header("Location: index.php?success=1");
    exit;
}
?>