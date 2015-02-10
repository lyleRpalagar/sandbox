<?php

      try{
            include '../model/connection.php'; 
            include '../controller/functions.php';
      }
        catch(EXCEPTION $ex){
               echo 'Error files not found';
        }
      if(isset($_POST['submit'])){
      	//Grab all of the Users Data's thats been inputed in the login form, and put it in a variable
      	$userName = $_POST['userName'];
      	$password = $_POST['password'];
        // Grab Email 
        $email = getUserEmail($userName, $password);
        // Compare the Users Data to whats been stored in the DB
        $login = login($userName, $password);
      

        if( $login == true){
        	// yay 
            // Put User's Email in the url and Redirect them to the Users Login Home Page.
           Header('Location: ../view/client.php?email='.$email);
        }
         else if ( $login == false) {
           // boo 
         	$error = 'Wrong Username / Password';

         }
           else{
           	  // something went wrong with the login function.
           	  $error ='Something is wrong with your login function';
           }

      }
        else{
        	$error = "Please input Username and Password";
        }
?>

<!DOCTYPE HTML>
<html>
  <head>
  	 <meta charset = "utf-8"/>
  	 <title> Login </title> 
  </head>

  <body>
      <h1>Login: </h1>
      <?php echo $error; ?>
  <form action="<? echo $_SERVER['PHP_SELF']; ?>" method = "POST">
         Username:  <input type="text" name="userName" value="<?= htmlentities($_POST['userName']); ?>" />
         <br/>
         Password: <input type="password" name="password" />
         <input type="submit" name="submit" value="Submit"/>
      </form>
  </body>

</html>