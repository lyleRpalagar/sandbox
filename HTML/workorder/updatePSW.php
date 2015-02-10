<?php

    include 'includes/connection.php';

        if(isset($_POST['oldpassword'])){
        // use to validate if the user is in the database
            $oldpassword = $_POST['oldpassword'];
            $cpassword = $_POST['cpassword'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM website_testing_user WHERE  password='".$oldpassword."' LIMIT 1";



         // Use to grab the users id and put it into the url
            $query =  mysql_query("SELECT * FROM website_testing_user WHERE  password='".$oldpassword."' LIMIT 1");
            $getUserId = mysql_fetch_array($query);
            $userID = $getUserId['id_user'];

              $res = mysql_query($sql);
              if($cpassword == $password) {
                if(mysql_num_rows($res) == 1){
                  // update password and than send them back to the login screen
                  $u = "UPDATE website_testing_user SET `password` = '$_POST[password]' WHERE id_user = '".$userID. "'";
                    // run the query ($u) or die   
                      mysql_query($u) or die(mysql_error()); 
                      $confirm = "<p class='confirm'> Password has been changed. </p><br/>";

                    //delays for 2s than reidrects to the index.php
                      header('Refresh:2 ; URL=index.php');
                }
                      else{
                          $error = "<p class='error'>Wrong Password. </p>";
                    }
              }
              else {
                $error = "<p class='error'>Confirm Password did not match our systems. If problem consist please call our Support Line. </p>";
              }

        }
?>



<!doctype html>
   <html lang="en">
      <head>
         <meta charset="utf-8">
         
          <?php include "includes/head.php"; ?>

         <title> Update Password | OpenBook Support</title>

      </head>

<body onload="getHeight()">
  <div id="header">

      <?php include "includes/header.php"; ?>

  </div>

  <div id="phoneSquare" class="phone"><img id="callPhone" src="img/phone.png" /></div>
  <div class="clear"></div>
 
  <div id="wrapper">

        <h1>Work Order Login</h1>

        <form id="loginForm" target="" action = "<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <h2> <?php echo $confirm ?> </h2>
        <div id="oldpassword" name="oldpassword">Current Password </div>
        <input type="password" id="oldpassword" name="oldpassword" placeholder="Current Password" />
        <br /> 
        <div id="password1" name="password">New Password:</div>
        <input type="password" id="password" name="password" placeholder="Enter Password" />

        <div id="cpassword1" name="cpassword">Confirm Password:</div>
        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" />
        <input type="hidden" maxlength:"50"  name = "id_user" value="<?php echo $userID ?>" />

        <button onclick="">Update Password</button><div class="clear"></div>
        <br />
        <?php echo $error ?>
        </form>

<hr style="margin-top: 15%; min-width:100%">


        </div>


        <div id="footer">

            <?php include "includes/footer.php";?>

        </div>

</body>
<html>