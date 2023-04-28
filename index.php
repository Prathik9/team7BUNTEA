<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<link rel="stylesheet" href="style.css">
</head>
<body background="3607424.jpg">
	<div class=p>
	<a href="logout.php">Logout</a>
	<h1>Audio recognition Page</h1>
	<br>
	Hello, <?php echo $user_data['user_name']; ?></div>
</body>
</html>