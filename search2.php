<!DOCTYPE HTML>
<html>
<head>
<title></title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-m.css" rel='stylesheet' type='text/css' />
<link href="css/font.css" rel="stylesheet">
    <style>
body, html {
    margin: 0;
    padding: 0;
}

.center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    width: 300px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Styling form labels */
form label {
    display: block;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Styling form input fields */
form input[type="text"] {
    width: calc(100% - 10px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Styling form button */
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

/* Hover effect for the button */
form input[type="submit"]:hover {
    background-color: #45a049;
}

/* Styling the text field wrapper */
.txt_field {
    position: relative;
}

/* Styling the underline effect */
.txt_field input[type="text"] + span::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    bottom: 0;
    left: 0;
    background-color: #4CAF50;
    visibility: hidden;
    transform: scaleX(0);
    transition: all 0.3s ease-in-out;
}

/* Highlighting the underline effect on focus */
.txt_field input[type="text"]:focus + span::before {
    visibility: visible;
    transform: scaleX(1);
}

    </style>
</head>
<body>
    <?php include('includes/header.php');?>
    <div class="center">
     <br> <br>
    <form action="search.php" method="POST">
        <label for="search_id"><h2><b>OB No:</b></h2></label>
        <div class="txt_field">
            <input type="text" id="reportId" name="reportId" required>
            <span></span>
            
          </div>
       
        <br> <br>
        <input id="reset_input" type="submit" value="Search">
    </form>`</div>
</body>
</html>