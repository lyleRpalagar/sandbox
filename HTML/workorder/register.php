<?php
include 'includes/connection.php';

if(isset($_POST['submit'])){

//Perform the verifcation

	$email1 = $_POST['email1'];

	$email2 = $_POST['email2'];

	$pass1  = $_POST['pass1'];

	$pass2  = $_POST['pass2'];

	// if the email matches the confirmation email procceed
		if($email1 == $email2){
		//if the password matches the confirmation procceed
			if($pass1 == $pass2){
				//all good. carry on.
				// Grab the information and put it in the variable.
					$fname = mysql_escape_string($_POST['fname']);
					$lname = mysql_escape_string($_POST['lname']);
					$email1 = mysql_escape_string($_POST['email1']);
					$email2 = mysql_escape_string($_POST['email2']);
					$pass1 = mysql_escape_string($_POST['pass1']);
					$pass2 = mysql_escape_string($_POST['pass2']);
					$property = mysql_escape_string($_POST['property']);
					$website = mysql_escape_string($_POST['website']);
				// salt the password so that it is incripted once it is put into the database.
					$pass1 = md5($pass1);
				// sql statement use to see if the email has been already created.
					$sql = mysql_query("SELECT * FROM `website_testing_user` WHERE `email` = '$email1'");
				//if the sql statement has brought up even one result than push an error
					if(mysql_num_rows($sql) > 0){
						 $errorMatch = "Sorry, That email already exist";
					}

					else{
					// if the sql statement has not brought up any results than create a row int he database with the following information.
						mysql_query("INSERT INTO `website_testing_user` (`id_user`, `fname`, `lname`, `email`, `password`, `property`, `website`) VALUES (NULL, '$fname', '$lname', '$email1', '$pass1', '$property', '$website')") or die(mysql_error());
						$confirm = 'Thank you for Registering!';
					// this will wait for 2mins and show the ^ confirm variable and than redirect the user to index.php
						header('Refresh:2 ; URL=index.php');
					}
			}else{

				// Error if the passwords do not match.
				$errorPsw = "Sorry, your passwords do not match.<br/>";
			}
		}else{
			// Error if the emails do not Match.
			$errorEmail = "Sorry your email's do not match <br/><br/>";
		}

  }

?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php include "includes/head.php";?>
		<title> Register | OpenBook Work Order</title>

	</head>
		<body onload="getHeight()">

			<div id="header">
				<?php include "includes/header.php";?>
			</div>
		<!-- This div will show when in mobile perspective -->
		  <div id="phoneSquare" class="phone"><a href="tel:+12086240374"><img id="callPhone" src="img/phone.png" /></a></div>
		  <div class="clear"></div>
		 <!-- /phoneSquare -->
		  	<div id="wrapper">
		  			<h1 style="margin-top:14px !important;">Work Order Register</h1>
		  	<!-- this is where the error msg will display if there is something wrong with the form. -->
		  		<div id="errorMsg">
		  			<h2><?php echo $errorMatch; ?> </h2>
					<h2><?php echo $errorPsw; ?> </h2>
					<h2><?php echo $errorEmail; ?></h2>
					<h2 style="color:#26972D !important;"><?php echo $confirm;?></h2>
				</div>
			<!-- /errorMsg -->
					<form id="contentForm"  action="register.php" method="POST">
						<div id="formWrapper">
			
											<!-- ****** htmlentities is a built in php function that saves the users information after it refreshes the page. -->
								First Name:   <input type="text" name="fname" value="<?= htmlentities($_POST['fname']); ?>"/> <br/>
								Last Name:    <input type="text" name="lname" value="<?= htmlentities($_POST['lname']); ?>"/> <br/>
								Property:     <input type="text" name="property" value="<?= htmlentities($_POST['property']); ?>"/><br/>
								Website:      <input type="text" name="website" value="<?= htmlentities($_POST['website']); ?>"/><br/>
							<!-- 	Username:     <input type="text" name="username"/><br/> -->
								Email:        <input type="email" name="email1" value="<?= htmlentities($_POST['email1']); ?>" /><br/>
							    Confirm Email:<input type="email" name="email2" value="<?= htmlentities($_POST['email1']); ?>"/><br/>
								Password:     <input type="password" name="pass1"/><br/>
							Confirm Password: <input type="password" name="pass2"/><br/>
							</div>
							<hr style="margin-top: 3%; min-width:100%">
						<!-- Submit button -->
							<input type="submit" value="Register" name="submit" id="submission"  style="margin-right: 218px; margin-bottom: 3px;"/>
							<div class="clear"></div>
						<!-- /submit -->
					<!-- if they already have an account with OB than they can click this link which will redirect them to the log in screen. -->
						<p style="float:right;"> or if you have already register please <a href="index.php"> Log In </a></p>
					</form>
		
		
		
			</div>
			
			<div id="footer">
			    <?php include "includes/footer.php";?>
			</div>
		</body>
</html>