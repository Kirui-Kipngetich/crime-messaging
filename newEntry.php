<?php
// Include the autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$sid = "AC096d3c60654519b87ac312e1a782bcfe";
$token = "c7042365f4886bc7d2143099cc9f9fae";
$twilio = new Client($sid, $token);

// Database credentials
$dbHost = 'localhost';
$dbName = 'crime_db';
$dbUser = 'root';
$dbPass = '';
$charset = 'utf8mb4';

// DSN for PDO connection
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";

// Options for PDO connection
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Establish a database connection
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepare the SQL statement
    $stmt = $pdo->prepare("INSERT INTO crime(reportId, date, nature, location, description, witness_name, phone_number, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Generate a unique report ID
    $reportId = uniqid('OB_'); // This generates a unique ID like 'OB_62a7c8b373f1a'

    // Execute the statement with the form data
    try {
        $stmt->execute([
            $reportId, // Use the generated report ID
            $_POST['date'],
            $_POST['nature'],
            $_POST['location'],
            $_POST['description'],
            $_POST['witness_name'],
            $_POST['phone_number'],
            $_POST['status']
        ]);

        // Send the actual value of the ID as a message
        $message = $twilio->messages->create(
            $_POST['phone_number'], // to
            [
                "from" => "+15513138282",
                "body" => "Your report ID is: " . $reportId
            ]
        );

         // JavaScript code to display the message SID in an alert box and redirect
         echo "<script>alert('Message SID: " . $message->sid . "'); window.location.href = 'index.php';</script>";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error occurred while inserting data into the database: " . $e->getMessage();
    } catch (Twilio\Exceptions\TwilioException $e) {
        // Handle Twilio errors
        echo "Error occurred while sending the SMS: " . $e->getMessage();
    }
}
?>
