<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crime_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO follow_up (reportId, officer_names, follow_up_actions) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $reportId, $officer_names, $follow_up_actions);

    // Set parameters and execute
    $reportId = $_POST['reportId'];
    $officer_names = $_POST['officer_names'];
    $follow_up_actions = $_POST['follow_up_actions'];
    $stmt->execute();

    // Close connections
    $stmt->close();
    $conn->close();

    // Redirect back to index.html with an alert
    echo "<script>alert('Data submitted successfully!'); window.location.href = 'index.php';</script>";
    exit;
}
?>
