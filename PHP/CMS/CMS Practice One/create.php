<?php
  // including the code from connection.php 
	include 'includes/connection.php';


 // getting the information from the form and setting it up to a php table.	
	$name = $_POST['inputName'];
	$desc = $_POST['inputDesc'];

 // incase the user didnt submit the form 
	// if sumbit form has not been sent echo and redirect the user.
	if(!$_POST['submit']){
		echo "please fill out the form";
		header('Location: index.php');
	}
		else{
			mysql_query("INSERT INTO people (`ID`,`NAME`,`DESCRIPTION`)
						   VALUES(NULL,'$name','$desc')") or die(mysql_error());
			echo "User has been added!";
			header('Location: index.php');

		}

?>