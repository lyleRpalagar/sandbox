<?php
	 try{ 
            include '../model/connection.php'; 
            include '../controller/functions.php';
	 	} catch(EXCEPTION $ex){
	 		 echo 'error files not found'; 
	 	   } 
	 	   // grab email from URL using the GET method Put it into a variable 
	 	    $email = $_GET['email']; 
	 	   // Use that variable and put it in a sql variable to grab user's information. 
	 	   // put the users' information into a variable 
	 	    
	 	   $userInfo = grabEmailFromURL($email); 
	 	    $user_id = $userInfo[0]; 
	 	    $first = $userInfo[1]; 
	 	    $last = $userInfo[2];
	 	    $email = $userInfo[4]; 
	 	    $phone = $userInfo[3];
?> 
<!DOCTYPE html> 
<html> 
	<head>
	    <meta charset="utf-8"> 
	 	<title> Welcome!</title> 
	 <link rel="stylesheet" type="text/css" href="../css/custom.css" />
     <script type="text/javascript" src= "../js/custom.js"></script>
    </head> 
    <body> 
    	<div id="userInfo" class="show"> 
    		<h2> User Information: </h2> 
    		<?php echo $first; ?> <br/> 
    		<?php echo $last; ?> <br/>
    		<?php echo $email; ?> <br/>
    		<?php echo $phone; ?> 

       <button type="button" onclick="edit()">Edit </button> 
    	</div>
    	 <form id ="updateForm" action ="<?php echo $_SERVER['PHP_SELF']?>" method ="POST">
     	<div id="modifyInfo" class="hide">
   	    <label> First Name: </label>  <input type="text" name="first" value="<?php echo $first; ?>">
   	    <label> Last Name: </label>   <input type="text" name="last" value="<?php echo $last; ?>">
   	    <label> Email Address: </label> <input type="text" name="email" value="<?php echo $email; ?>">
   	    <label> Phone Number: </label> <input type="text" name="phone" value="<?php echo $phone; ?>">
   	      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
   	      <input type="hidden" name="login_id" value="<?php echo $login_id;?>">

   	    	<a href="index.php?email=<?php echo $email; ?>" > Cancel </a>
   	    	<input type="submit" value="Update" name="submit">
         </div>
     </form>
            <form id="emailForm" action="/controller/email.php" method="POST">
              <input type="hidden" name="first" value="<?php echo $first;?>"/>
              <input type="hidden" name="last" value="<?php echo $last;?>"/>
              <input type="hidden" name="email" value="<?php echo $email;?>"/>
              <input type="hidden" name="phone" value="<?php echo $phone;?>"/>
              Subject <input type="text" name="subject" placeholder="Subject Line"/>
              <br/>
              Message <br/><textarea cols="50" rows="10" name="msg"></textarea>
              <input type="submit" name="submit" value="Submit"/>
            </form>
     </body>
 </html>