<?php
   try{
	 require $_SERVER['DOCUMENT_ROOT'].'/model/dbconnect.php';
	 require $_SERVER['DOCUMENT_ROOT'].'/controller/function.php';
	}
	catch(Exception $ex){
		echo 'error Dbconnect.php now found';
	}


if(!isset($_POST['submit'])){
	$action = $_GET['action'];
		$info = getPage($action);
		$h1  = $info['h1'];
		$h2  = $info['h2'];
		$h3  = $info['h3'];
		$column1  = $info['column1'];
		$column2  = $info['column2'];
		$column3  = $info['column3'];
		$column4  = $info['column4'];
		$column5  = $info['column5'];
		$id = $info['id'];
}

if(isset($_POST['submit'])){
	    $h1  = $_POST['h1'];
		$h2  = $_POST['h2'];
		$h3  = $_POST['h3'];
		$column1  = $_POST['column1'];
		$column2  = $_POST['column2'];
		$column3  = $_POST['column3'];
		$column4  = $_POST['column4'];
		$column5  = $_POST['column5'];
		$action=$_POST['action'];

		switch($action){
			case 'home':
			function updatesHomeAdmin(){
				$db = connectToGetTutor();
				$sql = "UPDATE home SET h1=:h1
					                  , h2=:h2
					                  , h3=:h3
					                  , column1=:column1
					                  , column2=:column2
					                  , column3=:column3
					                  , column4=:column4
					                  , column5=:column5
					                  WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':h1', $_POST['h1']);
				$stmt->bindParam(':h2', $_POST['h2']);
				$stmt->bindParam(':h3', $_POST['h3']);
				$stmt->bindParam(':column1', $_POST['column1']);
				$stmt->bindParam(':column2', $_POST['column2']);
				$stmt->bindParam(':column3', $_POST['column3']);
				$stmt->bindParam(':column4', $_POST['column4']);
				$stmt->bindParam(':column5', $_POST['column5']);
				$stmt->execute();
				}
				updatesHomeAdmin();
				Header('Location: /view/admin/index.php?action=home');
			break;
			case 'about':
			function updatesAboutAdmin(){
				$db = connectToGetTutor();
				$sql = "UPDATE about SET h1=:h1
					                  , h2=:h2
					                  , h3=:h3
					                  , column1=:column1
					                  , column2=:column2
					                  , column3=:column3
					                  , column4=:column4
					                  , column5=:column5
					                  WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':h1', $_POST['h1']);
				$stmt->bindParam(':h2', $_POST['h2']);
				$stmt->bindParam(':h3', $_POST['h3']);
				$stmt->bindParam(':column1', $_POST['column1']);
				$stmt->bindParam(':column2', $_POST['column2']);
				$stmt->bindParam(':column3', $_POST['column3']);
				$stmt->bindParam(':column4', $_POST['column4']);
				$stmt->bindParam(':column5', $_POST['column5']);
				$stmt->execute();
				}
			updatesAboutAdmin();
			Header('Location: /view/admin/index.php?action=about');
			break;
			case 'contact':
			function updatesContactAdmin(){
				$db = connectToGetTutor();
				$sql = "UPDATE contact SET h1=:h1
					                  , h2=:h2
					                  , h3=:h3
					                  , column1=:column1
					                  , column2=:column2
					                  , column3=:column3
					                  , column4=:column4
					                  , column5=:column5
					                  WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':h1', $_POST['h1']);
				$stmt->bindParam(':h2', $_POST['h2']);
				$stmt->bindParam(':h3', $_POST['h3']);
				$stmt->bindParam(':column1', $_POST['column1']);
				$stmt->bindParam(':column2', $_POST['column2']);
				$stmt->bindParam(':column3', $_POST['column3']);
				$stmt->bindParam(':column4', $_POST['column4']);
				$stmt->bindParam(':column5', $_POST['column5']);
				$stmt->execute();
				}
			updatesContactAdmin();
			Header('Location: /view/admin/index.php?action=contact');
			break;
			case 'policy':
			function updatesPolicyAdmin(){
				$db = connectToGetTutor();
				$sql = "UPDATE policy SET h1=:h1
					                  , h2=:h2
					                  , h3=:h3
					                  , column1=:column1
					                  , column2=:column2
					                  , column3=:column3
					                  , column4=:column4
					                  , column5=:column5
					                  WHERE id = $_POST[id]";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':h1', $_POST['h1']);
				$stmt->bindParam(':h2', $_POST['h2']);
				$stmt->bindParam(':h3', $_POST['h3']);
				$stmt->bindParam(':column1', $_POST['column1']);
				$stmt->bindParam(':column2', $_POST['column2']);
				$stmt->bindParam(':column3', $_POST['column3']);
				$stmt->bindParam(':column4', $_POST['column4']);
				$stmt->bindParam(':column5', $_POST['column5']);
				$stmt->execute();
				}
			updatesPolicyAdmin();
			Header('Location: /view/admin/index.php?action=policy');
			break;
		}
				
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php echo $action; ?> | Modify </title>
		<link rel="stylesheet" type="text/css" href="/css/main.css"/>
		<script type="text/javascript" src="/js/main.js"></script>
	</head>
	<body onload="getHeight()">
		<div id="wrapper">
		<div id="adminNav">
			<ul>
				<li><a href="../logout.php" id="logo"> Log Out </a></li>
				<li><a href="?action=home">Home</a></li>
				<li><a href="?action=about">About</a></li>
				<li><a href="?action=contact">Contact</a></li>
				<li><a href="?action=policy">Policy</a></li>
		    </ul>
		</div>
		<div id="container">
			<div id="adminForm">
				<h1> Pick A Page To Modify</h1>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<label>H1: </label><br/> <textarea name="h1" cols="25" rows="5"><?php echo $h1;?></textarea><br/>
					<label>H2: </labeL><br/> <textarea name="h2" cols="25" rows="5"><?php echo $h2; ?></textarea><br/>
					<label>H3: </labeL><br/> <textarea name="h3" cols="25" rows="5"><?php echo $h3;?></textarea><br/>
					<label>Column 1:</label><br/> <textarea name="column1" cols="50" rows="25"><?php echo $column1; ?></textarea> <br/>
					<label>Column 2:</label><br/> <textarea name="column2" cols="50" rows="25"><?php echo $column2; ?></textarea> <br/>
					<label>Column 3:</label><br/> <textarea name="column3" cols="50" rows="25"><?php echo $column3; ?></textarea> <br/>
					<label>Column 4:</label><br/> <textarea name="column4" cols="50" rows="25"><?php echo $column4; ?></textarea> <br/>
					<label>Column 5:</label><br/> <textarea name="column5" cols="50" rows="25"><?php echo $column5; ?></textarea> <br/>
					<input type="hidden" name="id" value="<?php echo $id; ?>"/>
					<input type="hidden" name="action" value="<?php echo $action; ?>"/>
					<input id="submit" type="submit" value="Modify" name="submit"/>
			    </form>
      		</div>
		</div>
		<div class="clear"></div>
		<div id="footer">

					<ul>
						<li id="copy">&copy; 2014 Xospheriac.com</li>				
					</ul>
		</div>
	</div>
	</body>
</html>