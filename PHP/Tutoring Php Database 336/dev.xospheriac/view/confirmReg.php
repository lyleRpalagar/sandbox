<?php
  session_start();
$email = $_GET['email'];
  Header("Refresh:2 ; URL=login.php");

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> Registeration Confirmation </title>
	</head>
	<body style="background-color:#f9f8f7;">
		<div style="margin: 0px auto 0px auto;padding-left:15px; width: 400px; border: 1px solid Gray">
		<div id="adminMsg">
			<h2> Thank you for Registering!</h2>
		</div>
		</div>
	</body>
</html>