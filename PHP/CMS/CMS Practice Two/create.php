<?php
  // including the code from connection.php 
	include 'includes/connection.php';


 // getting the information from the form and setting it up to a php table.	
	$property_id = $_POST['property_id'];
	$label = $_POST['label'];
	$url = $_POST['url'];
	$page = $_POST['page'];
	$h1 = $_POST['h1'];
	$col1 = $_POST['col1'];
	$col2 = $_POST['col2'];
	$col3 = $_POST['col3'];
	$col4 = $_POST['col4'];
	$meta_id = $_POST['meta_id'];


 // incase the user didnt submit the form 
	// if sumbit form has not been sent echo and redirect the user.
	if(!$_POST['submit']){
		echo "please fill out the form";
		header('Location: index.php');
	}
		else{
			mysql_query("INSERT INTO website_testing (`id`,`property_id`,`label`,`url`,`page`,`h1`,`col1`,`col2`,`col3`,`col4`,`meta_id`)
						   VALUES(NULL,'$property_id','$label','$url','$page','$h1','$col1','$col2','$col3','$col4','$meta_id')") or die(mysql_error());
			echo "User has been added!";
			header('Location: index.php');

		}

?>