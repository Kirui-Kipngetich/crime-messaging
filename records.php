<!DOCTYPE HTML>
<html>
<head>
<title></title>
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
<table>
    <tr>
        <th>Date</th>
        <th>Nature</th>
        <th>Location</th>
        <th>Description</th>
        <th>Witness</th>
        <th>Phone Number</th>
        <th>Follow Up</th>
        <th>Status</th>
        <th>CASE_No.</th>
        <th>OB_No.</th>
        
    </tr>
<?php
require_once("connect.php");
$table = "crime";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>0 results</td></tr>";
}

$conn->close();
?>
</table>

</body>
</html>
