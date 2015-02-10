<?php
//  If you need help on understanding this code : 
//  http://teamtutorials.com/web-development-tutorials/php-tutorials/creating-a-form-that-will-search-a-mysql-database 
	include 'includes/connection.php';

	$term = $_POST['term'];

	$sql = mysql_query("SELECT * FROM website_testing WHERE property_id='$term' ");

	// This echos Out the ID you are searching for
	echo "<h1> Property ID: ".$term."</h1>";

     //displaying data from the database table
	//while loop is made so that every data in the table will be echoed in an html tag.
	// This will echo out the Tables in the database that is associated with the PROERTY_ID
	// The a href is linked to the Lable that will be displayed if clicked will lead them to modify.php
	while($website_testing = mysql_fetch_array ($sql)){
		echo "<h3><a href=\"modify.php?id=" . $website_testing['id'] . "\">". $website_testing['label'] . "</a></h3>";
	}	

?>