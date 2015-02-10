<?php

    include 'includes/connection.php';

        if(isset($_POST['email']) && isset($_POST['password'])){
        // use to validate if the user is in the database
            $email =  mysql_escape_string($_POST['email']);
            $password = mysql_escape_string($_POST['password']);
            $password=md5($password);
            $sql = "SELECT * FROM website_testing_user WHERE  email='".$email."' AND password='".$password."' LIMIT 1";
            
           // Use to grab the users id and put it into the url
            $query =  mysql_query("SELECT * FROM website_testing_user WHERE  email='".$email."' AND password='".$password."'");
            $getUserId = mysql_fetch_array($query);
            $userID = $getUserId['id_user'];
            $user = $getUserId['user'];


              // ERROR function.
              $res = mysql_query($sql);
              if($user == 0) {
                  if(mysql_num_rows($res) == 1){
                      header('Location: submission.php?id='.$userID);
                  }
                      else{
                          $error = "<p class='error'>Wrong Username or Password. </p>";
                    }
              }
              else {
                echo "<script type='text/javascript'> window.alert('your an admin user'); </script>";
              }
        }
?>


<!DOCTYPE HTML>
   <html lang="en">
      <head>
         <?php include "includes/head.php";?>
              <title>Work Order | OpenBook</title>
      </head>

    <body onload="getHeight()">
            <div id="header">
                <?php include "includes/header.php";?>
            </div>
          <!-- This div will show when in mobile perspective -->
            <div id="phoneSquare" class="phone"><a href="tel:+12086240374"><img id="callPhone" src="img/phone.png" /></a></div>
          <!-- /phoneSquare --> 
            <div class="clear"></div>
           
            <div id="wrapper">
          
                 <h1>Work Order Login</h1>
                 
                 <form id="loginForm" target="" action = "<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                      <!-- email -->
                        <div id="email1" name="password">Email:</div>
                          <input type="email" id="email" name="email" placeholder="Enter Email" value="<?= htmlentities($_POST['email']); ?>">
                      <!-- password -->
                        <div id="password1" name="password">Password:</div>
                         <input type="password" id="password" name="password" placeholder="Enter Password" />
                      
                      
                      <div class="error">
                          <?php echo $error ?>
                      </div>
                      <br />                     
                      <!-- Submission Button -->
                      <button onclick="">Login</button>
                      
                      <div class="clear"></div>
                      
                      <p style="margin-left:143px; width:74%; margin-top:14px;"> 
                            Don't have a account? click here to <a href ="register.php"> Register.</a>
                      </p>  
                 </form>
                 <hr style="margin-top: 15%; min-width:100%">
                 
          
          </div> <!-- wrapper -->
          
          
          <div id="footer">
          
              <?php include "includes/footer.php";?>
          
          </div>
    
    </body>
<html>
