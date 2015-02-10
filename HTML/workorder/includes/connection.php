<?php
	//info to connect to the database
	$dbhost = 'localhost';  //the database your server is hosted on
	$dbuser = 'root';		//database user
	$dbpass = '';			// database psw
	$db = '602590_obcentral2';		//database name

	//connect to the server
	$conn = mysql_connect ($dbhost, $dbuser,$dbpass);
	//connecting to the actually database
	mysql_select_db($db);

?>