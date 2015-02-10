<?php
	//info to connect to the database
	$dbhost = 'mysql51-043.wc2.dfw1.stabletransit.com';  //the database your server is hosted on
	$dbuser = '602590_obcheff';		//database user
	$dbpass = 'S8j]1{nle_$4_3f62s5!36-]u56n@y';			// database psw
	$db = '602590_obcentral2';		//database name

	//connect to the server
	$conn = mysql_connect ($dbhost, $dbuser,$dbpass);
	//connecting to the actually database
	mysql_select_db($db);
?>