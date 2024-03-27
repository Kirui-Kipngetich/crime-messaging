<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-m.css" rel='stylesheet' type='text/css' />
<link href="css/font.css" rel="stylesheet">
<style>
    .banner {
        background-image: url('images/name.jpg');
        background-size: cover;
        background-position: center;
        height: 70vh; 
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
</head>
<body>
<?php include('includes/header.php');?>
<div class="banner">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">  </h1>
		
	</div>
</div>
	

</body>
</html>