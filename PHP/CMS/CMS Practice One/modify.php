<?php
	include 'includes/connection.php';
	if(!isset($_POST['submit'])) {
		$q = "SELECT * FROM people WHERE ID = $_GET[id]";
		$result = mysql_query($q);
		$person = mysql_fetch_array($result);

	}
 ?>

 <h1> You Are Modifying A User </h1>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Name<input type="text" name="inputName" value="<?php echo $person['Name']; ?>" /><br/>
		Description<input type="text" name="inputDesc" value="<?php echo $person['Description']; ?>" /><br/>
		<br/>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
		<input type="submit" name="submit" value="Modify" />

	</form>

<?php
	if(isset($_POST['submit'])){
		$u = "UPDATE people SET `Name`='$_POST[inputName]', `Description` ='$_POST[inputDesc]' WHERE ID = $_POST[id]";
		mysql_query($u) or die(mysql_error());

			echo "User has been modified!";
			header("Location: index.php");
	}

?>