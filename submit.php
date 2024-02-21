<?php
// Import database connection file
error_reporting(0);
require_once('./db-connection.php');

// Check form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Read Form Inputs
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    // IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];


    // Form Validation
// Check for required fields
if(empty($full_name) || empty($phone_number) || empty($email_address) || empty($subject) || empty($message)){
    echo "Error: All fields are required!";
        exit();
}

// Validate Phone Number
if(!preg_match("/^\d{10}$/", $phone_number)){
    echo "Error: Enter a valid phone number!";
        exit();
}

// Validation for email
if(!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
    echo "Error: Enter a valid email address!";
        exit();
}

// Save data to database
$sql = "INSERT INTO `contact_form`(`full_name`, `phone_number`, `email_address`, `subject`, `message`, `ip_address`) VALUES ('$full_name','$phone_number','$email_address','$subject','$message','$ip_address')";

if($conn->query($sql) === TRUE){
    // Send Email
    $to = "pallavikri880@gmail.com";
    $email_subject ="New Contact Submission!";
    $email_message = "Full Name: $full_name\nPhone Number: $phone_number\nEmail Address: $email_address\nSubject: $subject\nMessage: $message\nIP Address: $ip_address";
    $headers = "From : $email_address\r\n";

    if(mail($to,$email_subject, $email_message,("From : $email_address"))){
        echo "Success: Message sent successfully.";
        exit();
    }else{
        echo "Error: Sorry! Some error occurred in sending email after submission.";
        exit();
    exit();
    }
}else{
    echo "Error: Sorry! Some error occurred in saving form data to database.";
        exit();
}

$conn->close();
    
}

?>