<!DOCTYPE HTML>
<html>
<head>
<title>Crime Report Form</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-m.css" rel='stylesheet' type='text/css' />
<link href="css/font.css" rel="stylesheet">
<style>
body, html {
    margin: 0;
    padding: 0;
}

form {
    margin: 20px auto;
    width: 80%;
    max-width: 600px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

form label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="datetime-local"],
form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>
</head>
<body>
<?php include('includes/header.php');?>
<form action="newEntry.php" method="POST">
    <label for="date">Date and Time:</label>
    <input type="datetime-local" id="date" name="date" required>

    <label for="nature">Nature of Occurence:</label>
    <input type="text" id="nature" name="nature" required>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label for="witness">Witness Name:</label>
    <input type="text" id="witness" name="witness_name" required>

    <label for="phone_number">Phone Number:</label>
    <input type="text" id="phone_number" name="phone_number">

    <div>
    <label for="status">Status:</label>
    <select id="status"  name="status" class="dropbtn">
                <option value="Active">Active</option>
                <option value="Closed">Closed</option>
            </select>
    </div><br>

    <button type="submit">Submit Entry</button>
</form>
</body>
</html>
