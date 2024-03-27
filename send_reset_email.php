<?php
// We included guidance in the comments as we worked as a group
// Database connection parameters
$host = "localhost"; // database host
$username = "root"; // database username
$password = ""; // database password
$database = "crime_db"; // database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include Composer autoloader for PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    // Check if the email exists in the database
    $check_email_sql = "SELECT * FROM login WHERE email = '$email'";
    $result = $conn->query($check_email_sql);
    
    if ($result->num_rows > 0) {
        // The email exists in the database, generate a token, and send the reset email

        // Generate a unique token (you can use a library like random_bytes)
        $token = bin2hex(random_bytes(32));
        $expiration_timestamp = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Store the token in the database
        $sql = "INSERT INTO password_reset_tokens (email, token, expiration_timestamp) VALUES ('$email', '$token', '$expiration_timestamp')";

        if ($conn->query($sql) === TRUE) {
            // Send the email with the token
            $mail = new PHPMailer(true);

            try {
                // Configure your mailer here
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'kipngetiche790@gmail.com'; // Your SMTP username
                $mail->Password = 'ysja fyhq exav pmjx'; // Your SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption type (can be STARTTLS or SSL)
                $mail->Port = 587; // SMTP port (use 587 for STARTTLS or 465 for SSL)
                $mail->setFrom('kipngetiche790@gmail.com', 'reset_password'); // Sender information
                $mail->addAddress($email); // Recipient's email

                $mail->isHTML(true); // Enable HTML emails
                $mail->Subject = 'Password Reset Request';
                $mail->Body = "To reset your password, click the following link: <a href='localhost/system4/new_password.html?token=$token'>Reset Password</a>";

                $mail->send();

                // Email sent successfully
                echo '<script>alert("Email sent to your email address.");</script>';
                echo '<script>window.location.href = "forgotpassword.html";</script>';
            } catch (Exception $e) {
                // Handle any exceptions thrown by PHPMailer
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // The email doesn't exist in the database, provide an error message
        echo '<script>alert("Email does not exist in our database.");</script>';
        echo '<script>window.location.href = "forgotpassword.html";</script>';
    }
}

// Close the database connection
$conn->close();
?>
