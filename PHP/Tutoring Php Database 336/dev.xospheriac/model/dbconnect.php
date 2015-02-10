<?php 
function  connectToGetTutor(){
$server = 'localhost';
$dbname= 'xospheri_gettutor';
$username = 'xospheri_istud';
$password = '#A]g^X1T(kVA';
$dsn = 'mysql:host='.$server.';dbname='.$dbname;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

// Now create the actual connection object and assign it to a variable
try {
   $connectionToGetTutor = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
   echo 'Sorry, the connection failed';
   exit;
}

    return $connectionToGetTutor;
}

?>