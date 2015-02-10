<?php
session_start();

// IF YOU ADDED A VARIABLE IN EMAILVALIDATION.PHP please add the: && isset($_GET['EXAMPLE']) along in the if statement 
//after make the variable 
if(isset($_GET["fullName"]) && isset($_GET["telephone"]) && isset($_GET["email"]) && isset($_GET["arrive"]) && isset($_GET["depart"]) && isset($_GET["packages"])){
	//Who to email to:
	/*$email_to = "info@gosunrisetravel.com";*/
	$email_to = "marketing@openbook.net";
	//Subject line of the Email 
	$email_subject = "Someone Filled Out Your Sunrise Travel Contact Form!";

	//First & Last Name
	$fullName = $_GET['fullName']; // required
	
	//Phone
	$telephone = $_GET['telephone'];
	
	//Email
	$email_from = "From: " . $_GET['email']; // required

	//Arrival 
	$arrive = $_GET['arrive'];

	//Depart
	$depart = $_GET['depart'];

	//Page
	$packages = $_GET['packages'];


// ******************************************************************************************

	//Sending the Email

    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 // WHATEVER variable you created up top must be added down below in the same syntax 
    $email_message .= "First Name: ".clean_string($fullName)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";

    $email_message .= "Arival: ".clean_string($arrive)."\n";

    $email_message .= "Depart: ".clean_string($depart)."\n";
  
 
// create email headers
 $headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
mail($email_to, $email_subject, $email_message, $headers);  
//mail($to, $subject, $message, $headers);
 //Grabs the package value and will add it dynamically in the url and direct the user to where ever 
  header("Location: ../confirmation/packages/".$packages."Confirmation.php");
  exit;
}


?>