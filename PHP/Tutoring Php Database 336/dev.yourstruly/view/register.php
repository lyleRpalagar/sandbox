<?php
	 try{ 
            include '../model/connection.php'; 
            include '../controller/functions.php';
	 	} catch(EXCEPTION $ex){
	 		 echo 'error files not found'; 
	 	   } 
	 	   if(isset($_POST['submit'])){
                // create our variables that the user has inputed
	 	   	$first = $_POST['first'];
	 	   	$last = $_POST['last'];
	 	   	$phone = $_POST['phone'];
	 	   	$email = $_POST['email'];
	 	   	$email2 = $_POST['email2'];
	 	   	$userName = $_POST['userName'];
	 	   	$password = $_POST['password'];
	 	   	$password2 = $_POST['password2'];
	 	   	$permission = "user";

	 	   	    // make sure email 1 and email 2 are the same 
	 	   	if($email == $email2){
	 	   		$compare = compareEmail($email);
	 	   		  if ($compare == true){
	 	   		  	 // make sure the user and first name has been inputed
	 	   	   		 // continue on with program
	 	   		  	if ($userName != "" && $first != ""){
                          if($password === $password2){
                          		insertNewUser($first, $last, $phone, $email, $permission);
                          		insertNewCred($userName, $password, $email);
                          }
                          else{
                          	$error = "Passwords do not match, Please Try Again.";
                          }
	 	   		  	}
	 	   		  	  else{
	 	   		  	  	$error = "Please make sure all fields are filled.";
	 	   		  	  }
	 	   		  }
	 	   		   else{
	 	   		   	 $error = "Email already exist , Please Try Again.";
	 	   		   }
	 	   	    
	 	   	}
	 	   	else{
	 	   		$error = " Email's do not match , Please retype.";
	 	   	}
	 	   }

?>
<!DOCTYPE html>
<html>
 <head>
 	<meta charset="utf-8"> 
 	<title> Registeration </title>
 </head>
 <body>
 	<form id="registerForm" action = "<?php echo $_SERVER['PHP_SELF']?>" method ="POST">
        First Name: <input type="text" name="first" value="<?= htmlentities($_POST['first']); ?>"/><br/>
        Last Name:  <input type="text" name="last" value="<?= htmlentities($_POST['last']); ?>"/><br/>
        Phone:   <input type="text" name="phone" value="<?= htmlentities($_POST['phone']); ?>"/><br/>
        Email    <input type="email" name="email" value="<?= htmlentities($_POST['email']); ?>"/><br/>
        Re-Type Email: <input type="email" name="email2" value="<?= htmlentities($_POST['email2']); ?>"/><br/>
        Username  <input type="text" name="userName" value="<?= htmlentities($_POST['userName']); ?>"/><br/>
        Password: <input type="password" name="password"/><br/>
        Re-type Password: <input type="password" name="password2"/><br/>
        <input type="submit" value="Register" name="submit"/>
 	</form>
 </body>
</html>