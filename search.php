<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crime Report Table</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-m.css" rel='stylesheet' type='text/css' />
    <link href="css/font.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include('includes/header.php');?>

    <!-- First Table for Crime Report -->
    <table>
    <tr>
        <th>Date</th>
        <th>Nature</th>
        <th>Location</th>
        <th>Description</th>
        <th>Witness</th>
        <th>Follow Up</th>
        <th>Status</th>
        <th>OB_No.</th>
    </tr>
    <?php
    require_once("connect.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the auto-generated reportId
        $reportId = $_POST['reportId'];

        // Now you can retrieve the newly inserted record using the generated reportId
        // Prepare the SQL statement to fetch the newly inserted record
        $sql = "SELECT * FROM crime WHERE reportId = '$reportId'";

        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['nature'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['witness_name'] . "</td>";
                    echo "<td>" . $row['followUp'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['reportId'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No results found for id: $reportId</td></tr>";
            }
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</table>
    <table>
    <tr>
        <th>Officer Names</th>
        <th>Follow-up Actions</th>
    </tr>
    <?php
    require_once("connect.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if 'ob_no' key exists in $_POST array
        if(isset($_POST['reportId'])) {
            // Get the auto-generated reportId
            $reportId = $_POST['reportId'];

            // Now you can retrieve the newly inserted record using the generated reportId
            // Prepare the SQL statement to fetch the newly inserted record
            $sql = "SELECT * FROM follow_up WHERE reportId = '$reportId'";

            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['officer_names'] . "</td>";
                        echo "<td>" . $row['follow_up_actions'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No results found for id: $reportId</td></tr>";
                }
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "<tr><td colspan='8'>No OB number specified</td></tr>";
        }
    }
    $conn->close(); // Close database connection
    ?>
    </table>
</body>
</html>
