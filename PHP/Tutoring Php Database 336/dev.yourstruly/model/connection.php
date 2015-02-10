<?php

function  connectToDatabase(){
     
     //Database Server Name
	$server = "localhost"; 
	 // Database Name
	$dbName = "dev.yourstrully";
	 // UserName
	$dbUser = "root";
    // Password
  $dbPass = "root";
	 // DSN
	$dsn = "mysql:host=$server; dbname=$dbName";
	 // Error Exception
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      try{
        //function
          $connectToDB = new PDO($dsn, $dbUser, $dbPass, $option);
      }
        catch(PDOEXCEPTION $exc){
          //the error , put the error in variable , redirect it to the errorDoc
                echo 'Database connection is not working';
        }
        return $connectToDB;
}



?>