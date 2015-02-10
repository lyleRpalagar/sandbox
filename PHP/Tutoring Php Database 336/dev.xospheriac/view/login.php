<?php
   try{
	 require $_SERVER['DOCUMENT_ROOT'].'/model/dbconnect.php';
	 require $_SERVER['DOCUMENT_ROOT'].'/controller/function.php';
	}
	catch(Exception $ex){
		Header('Location: /view/errordocs/500.shtml');
	}
	 if(isset($_POST['submit'])){
	 	//Put info provided by user into variable
	 	$username = $_POST['username'];
	 	$oldpassword = $_POST['password'];
	 	$password = sha1($oldpassword);
	 	var_dump($password);

        $email = getEmail($username, $password);  // found in controller/function.php as getEmail();
        $login = loginUser($username, $password); // found in controller/function.php as loginUser();
	        if($login == true){
	        	// Compare permisssions 
	          	  $user = comparePermission($email);
	          	  $permission = $user['permission'];
	          	  // if Admin
	          	  	if ($permission == 'admin'){
	          	  		Header('Location: /view/admin/confirm.php');
	          	  	}	
	          	  	   else{
	          	  	   	// if User 
	          	  	   	  //Header('Location: /view/user.php?email='.$email);
	          	  	   		Header('Location: /view/confirm.php?email='.$email);
	          	  	   }
	        	 
	        }
	          else{
	          	$error = "Username / Password is Invalid.";
	          }
}   
	   else {
	   	$error = "Please Input your Username and / or Password.";

	   }

?>
<!DOCTYPE html>
<head>
	<meta charset = "utf-8"/>
	<title> login || dev.xospheriac.com </title>
	<link rel="stylesheet" type="text/css" href="/css/main.css"/>
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
			<div id="login">
				<h1> User Login: </h1>
				<div id="error"> <?php echo $error; ?> </div>
		
				<form action="<? echo $_SERVER['PHP_SELF']; ?>" method = "POST">
					<label>USERNAME</label> <input type="text" name="username" value="<?= htmlentities($_POST['username']); ?>"/>
					<br/>
					<label>PASSWORD</label> <input type="password" name="password"/>
					<br/>
					<input id="submit" type="submit" value="SUBMIT" name="submit"/>
					<p>Don't have an account?<b><a href="register.php"> REGISTER NOW!</a></b></p>
				</form>
			</div>
		</div>
		<div id="footer">
					<ul>
						<li id="copy">&copy; 2014 Xospheriac.com</li>
						<li><a href="/sitemap.php"> Sitemap</a></li>
						<li><a href="http://dev.xospheriac.com/index.php?action=policy">Policy</a></li>					
					</ul>
		</div>
	</div>
</body>
</html>