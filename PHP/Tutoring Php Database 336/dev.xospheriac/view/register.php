<?php

if(isset($_POST['submit'])){
  try{
   require $_SERVER['DOCUMENT_ROOT'].'/model/dbconnect.php';
   require $_SERVER['DOCUMENT_ROOT'].'/controller/function.php';
 }
  catch(Exception $ex){
     Header('Location: /view/errordocs/500.shtml');
  }   
   // Create our Variables that the User has inputed
   $first = $_POST['first'];
   $last = $_POST['last'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $email2 = $_POST['email2'];
   $username = $_POST['username'];
   $oldpassword = $_POST['password'];
   $oldpassword2 = $_POST['password2'];
   $password = sha1($oldpassword);
   $password2 = sha1($oldpassword2);
   $permission = "user";
         // Make sure email1 and email2 are the same
         if($email === $email2){
              $comparedEmail = compareEmail($email);
                if ($comparedEmail == true){
                 
                  // Make sure the User and First name has been inputed
                   if ($username != ""){
                         //continue on with the program
                       if($password === $password2){  
                            insertNewUser($first, $last, $phone, $email, $permission);
                            insertNewCred($username, $password, $email);
                                   Header('Location: /view/confirmReg.php');
                       } 
                         else{
                              $error = "Password does not match, Please Try Again";
                         }
                   }
                    else{
                      $error = "Please make sure you fill out all the forms.";
                    }
                }
                  else if($comparedEmail = false){
                      // stop the program
                      $error = " Email already exist in the Database, please input another email";
                  }
                      else {
                        // stop the program
                        $error = " Email already exist in the Database, please input another email.(2)";
                      }


      		}
      		else{
      		   $error = "Password has been inputed incorrectly. Please Try Again.";
      		}
}
  else{
      $error = "All fields are required.";
}
?>
<!DOCTYPE html>
<html>
	<head>
       <meta charset="utf-8"/>
       <title> Register | dev.xeospheriac.com </title>
       <link rel="stylesheet" type="text/css" href="/css/main.css"/>
        <script type="text/javascript" src="/js/main.js"></script>
	</head>
	<body onload="getHeight()">
  <div id="wrapper">
    <div id="nav">
      <?php include "../includes/nav.php"; ?>
    </div>
    <div id="container">
    <div id="register">
      <h1>Register</h1>
    		<div id ="error">
          <?php echo $error; ?>
        </div>
           <form id="registerForm" action ="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
           	    <label>First Name:</label> <input type="text" name="first" value="<?= htmlentities($_POST['first']); ?>"><br/>
           	    <label>Last Name:</label>  <input type="text" name="last" value="<?= htmlentities($_POST['last']); ?>"><br/>
           	    <label>Phone:</label> <input type="text" name="phone" value="<?= htmlentities($_POST['phone']); ?>"><br/>
           	    <label>Email:</label> <input type="email" name="email" value="<?= htmlentities($_POST['email']); ?>"><br/>
           	    <label>Re-type Email:</label> <input type="email" name="email2"><br/>
           	    <label>UserName:</label> <input type="text" name="username" value="<?= htmlentities($_POST['username']); ?>"><br/>
           	    <label>Password:</label> <input type="password" name="password"><br/>
           	    <label>Re-type Password:</label> <input type="password" name="password2"><br/>
           	    <input id="submit" type="submit" value="Register" name="submit"/>
                <a href="login.php"> Go Back </a>

           </form>
         </div>
            </div>
       <div id="footer">
        <?php include "../includes/footer.php";?> 
      </div>

     </div>
	</body>
</html>