<?php
	include 'includes/connection.php';
	if(!isset($_POST['submit'])) {
		$q = "SELECT * FROM website_testing WHERE id = $_GET[id]";
		$result = mysql_query($q);
		$website_id = mysql_fetch_array($result);

	}
	
	if(isset($_POST['submit'])) {
		$property_id = $_POST['property_id'];
		$u = "UPDATE website_testing SET `property_id` = '$_POST[property_id]', 
		                                 `label` = '$_POST[label]', 
		                                 `url` = '$_POST[url]', 
		                                 `page` = '$_POST[page]', 
		                                 `h1` = '$_POST[h1]', 
		                                 `col1` = '$_POST[col1]',
		                                 `col2` = '$_POST[col2]', 
		                                 `col3` = '$_POST[col3]', 
		                                 `col4` = '$_POST[col4]', 
		                                 `meta_id` = '$_POST[meta_id]'
		                             WHERE id = $_POST[id]";

		mysql_query($u) or die(mysql_error());
		Header("Location: search.php?term=".$property_id);
	}
?>
 <h1> You Are Modifying A Property Page </h1>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<b> Property ID: <input type="text" name="property_id" value="<?php echo $website_id['property_id']; ?>" /><br/> </b>
		<b> Label: <input type="text" name="label" value="<?php echo $website_id['label']; ?>" /><br/> </b>
		<b> Url: <input type="text" name="url" value="<?php echo $website_id['url']; ?>" /><br/> </b>
		<b> Page: <input type="text" name="page" value="<?php echo $website_id['page']; ?>" /><br/> </b>
		<b> H1: <input type="text" name="h1" value="<?php echo $website_id['h1']; ?>" /><br/> </b>
		<b> Col1: <br/><textarea rows="10" cols="50" name="col1"><?php echo $website_id['col1']; ?></textarea> <br/> </b>
		<b> Col2: <br/><textarea rows="10" cols="50" name="col2"><?php echo $website_id['col2']; ?></textarea> <br/> </b>
		<b> Col3: <br/><textarea rows="10" cols="50" name="col3"><?php echo $website_id['col3']; ?></textarea> <br/> </b>
		<b> Col4: <br/><textarea rows="10" cols="50" name="col4"><?php echo $website_id['col4']; ?></textarea> <br/> </b>
		<b> Meta_ID: <input type="text" name="meta_id" value="<?php echo $website_id['meta_id']; ?>" /><br/> </b>
		<br/>
		<input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>" />
		<input type="submit" name="submit" value="Update"/>
	</form>