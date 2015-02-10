<?php
	//info to connect to the database
	$dbhost = 'localhost';  //the database your server is hosted on
	$dbuser = 'root';		//database user
	$dbpass = 'root';			// database host
	$db = 'mysql_tut';		//database name

	//connect to the server
	$conn = mysql_connect ($dbhost, $dbuser,$dbpass);
	//connecting to the actually database
	mysql_select_db($db);
?>