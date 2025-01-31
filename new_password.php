<?php
// We included guidance in the comments as we worked as a group
// Include the necessary database connection
$host = "localhost"; // database host
$username = "root"; // database username
$password = ""; 
$database = "crime_db"; // database name

// database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    $token = $_POST["token"]; // This value is in a hidden input field, not passed via URL

    if ($new_password === $confirm_password) {
        // Passwords match, proceed with updating the password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the "login" table using prepared statements
        $update_query = $conn->prepare("UPDATE login SET password = ? WHERE email = (SELECT email FROM password_reset_tokens WHERE token = ?)");

        $update_query->bind_param("ss", $hashed_password, $token);

        if ($update_query->execute()) {
            // Password updated successfully
            echo '<script>alert("Password update successful.");</script>';
            echo '<script>window.location.href = "index.html";</script>'; // Redirect to a success page or login page
        } else {
            // Error occurred during the update
            echo '<script>alert("Password update unsuccessful.");</script>';
        }
    } else {
        echo '<script>alert("Passwords do not match.");</script>';
        echo '<script>window.location.href = "new_password.html";</script>';
    }
}

// Close the database connection
$conn->close();
?>