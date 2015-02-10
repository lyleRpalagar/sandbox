<?php
	include 'includes/connection.php';
	
		mysql_query("DELETE FROM website_testing WHERE id = $_GET[id]") or die(mysql_error());

			echo "User has been deleted!";
			header("Location: index.php");

?>