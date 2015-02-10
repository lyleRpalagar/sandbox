<?php
try{
   	 require $_SERVER['DOCUMENT_ROOT'].'/model/dbconnect.php';
     require $_SERVER['DOCUMENT_ROOT'].'/controller/function.php';
}
  catch(Exception $ex){
     Header('Location: /view/errordocs/500.shtml');
  }    
    // GRAB a variable from the url and put it into a variables
   	 $email = $_GET['email'];
     $error = $_GET['error'];
     
     $userInfo = grabEmailFromURL($email); // found in controller/function.php as getEmail();
    // for each array create a variable.
     $user_id = $userInfo[0];
     $first = $userInfo[1];
     $last  = $userInfo[2];
     $email = $userInfo[3];
     $phone = $userInfo[4];

    $login_id = grabCredentialTable($email); // found in controller/function.php as getEmail();

     // grab the users input and replace the data from the table row with the users input
      if(isset($_POST['submit'])){

        // Grab the users data from the Form and store it into the variable
          $first = $_POST['first'];
          $last =$_POST['last'];
          $email =$_POST['email'];
          $phone =$_POST['phone'];
          $user_id = $_POST['user_id'];
          $cred_id = $_POST['login_id'];

         if($first != "" && $last != "" && $email != "" && $phone != ""){
             updateUserInfo($first, $last, $email, $phone, $user_id);
             updateCredInfo($cred_id);
             // if it didnt die than send them back to the page with the updated information
              header('Location: user.php?email='.$_POST['email']);
            } 
              else{
                   header('Location: user.php?email='.$_POST['email'].'&error=Please make sure all data has been filled out, to update your information.');
             }
      }

?>    
<!DOCTYPE html>
<html>
  <head>
  	<meta charset = "utf-8"/>
     <title> GET TUTORED | dev.xospheriac.com </title>
     <link rel="stylesheet" type="text/css" href="/css/main.css" />
     <script type="text/javascript" src="/js/main.js"></script>
  </head>
  <body onload="getHeight()">
    <div id="wrapper">
        <div id="nav">           
        <ul>
          <li><a href="http://dev.xospheriac.com/index.php?action=home" id="logo">Xospheriac</a></li>
          <li><a href="http://dev.xospheriac.com/index.php?action=home">Home</a></li>
          <li><a href="http://dev.xospheriac.com/view/login.php">Get Tutored</a></li>
          <li><a href="http://dev.xospheriac.com/index.php?action=about">About</a></li>
          <li><a href="http://dev.xospheriac.com/index.php?action=contact">Contact</a></li>
          <li><a href="http://dev.xospheriac.com/index.php?action=policy">Policy</a></li>         
        </ul>
        </div>
      <div id="container">
     <div id="userInfo" class="show">
       <?php echo $first; ?> <br/>
       <?php echo $last; ?>  <br/>
       <?php echo $email; ?> <br/>
       <?php echo $phone; ?> <br/>
        <?php echo $error; ?>
       <button type="button" onclick="edit()">Edit </button> 
       <a href="logout.php"> Log Out </a>
   </div>
     <form id ="updateForm" action ="<?php echo $_SERVER['PHP_SELF']?>" method ="POST">
     	<div id="modifyInfo" class="hidden">
   	    <label> First Name: </label>  <br/> <input type="text" name="first" value="<?php echo $first; ?>"><br/>
   	    <label> Last Name: </label>   <br/> <input type="text" name="last" value="<?php echo $last; ?>"><br/>
   	    <label> Email Address: </label> <br/> <input type="text" name="email" value="<?php echo $email; ?>"><br/>
   	    <label> Phone Number: </label> <br/> <input type="text" name="phone" value="<?php echo $phone; ?>"><br/>
   	      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
   	      <input type="hidden" name="login_id" value="<?php echo $login_id;?>">

   	    	<a href="/view/user.php?email=<?php echo $email; ?>" > Cancel </a>
   	    	<input type="submit" id="submit2" value="Update" name="submit">
         </div>
     </form>
  
 <!-- Email Form Submission -->
 <form id="email" action = "../controller/emailController/email.php" method ="POST" enctype="multipart/form-data">
	 <h1> Get Tutored </h1>
	   <input type="hidden" name="first" value="<?php echo $first;?>" />
       <input type="hidden" name="last"  value="<?php echo $last;?>"  />
       <input type="hidden" name="email" value="<?php echo $email;?>" />
       <input type="hidden" name="phone" value= "<?php echo $phone;?>" />
	<select name="classes">
	  <option value="database">Database Design &amp; Development</option>
	  <option value="operating_system">Operationg System</option>
	  <option value="date_counseling">Date Counseling</option>
	  <option value="circus">Circus Clown Act</option>
	</select>
	<br/>
	<br/>
	<label> Availability: </label><br/><input type="date" name="date" style="width:12%;"> 
	<br/>
	<br/>
	<label> What do you need help on? </label>
	<br/>
	<textarea name="description" cols="50" rows="15" ></textarea>
	<br/>
	<input type="submit" id="submit" value="Send" name="submit"/>
</form>
</div>
    <div id="footer">
                <ul>
            <li id="copy">&copy; 2014 Xospheriac.com</li>
            <li><a href="sitemap.php"> Sitemap</a></li>
            <li><a href="http://dev.xospheriac.com/index.php?action=policy">Policy</a></li>
            <li><a href="logout.php">Log Out</a></li>          
          </ul>
    </div>
</div>
  </body>
</html>