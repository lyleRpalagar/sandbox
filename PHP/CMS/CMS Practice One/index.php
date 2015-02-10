<?php
	include 'includes/connection.php'; 

	//what connects the database and target information using query
	//select everything in the table from people
	$query = "SELECT * FROM people";

	//pass in our query variable. Which will then connect to the database and run the query
	$result = mysql_query($query);

	//displaying data from the database table
	//while loop is made so that every data in the table will be echoed in an html tag.
	while($person = mysql_fetch_array ($result)){
		echo "<h3>" . $person['Name'] . "</h3>";
		echo "<p>" . $person['Description'] ."</p>";
		echo "<a href=\"modify.php?id=" . $person['ID'] . "\">Modify User </a>";
		echo " <span> </span> ";
		echo "<a href=\"delete.php?id=" . $person['ID'] . "\">Delete User </a>";
	}	
?>


													<!-- IMPORTANT -->
<!-- to understand how to Connect to a Database and add tables  please visit http://www.youtube.com/watch?v=tqfl51HVodI -->
<!-- to understand how to Edit and Delete Data from a Database please visit http://www.youtube.com/watch?v=kc1bppUlqps&feature=c4-overview-vl&list=PL06BCCC8BA8732B8C-->

<!-- uses a form to input into the database table  -->
<h1> Create a User </h1>

	<form action="create.php" method="post">
		Name<input type="text" name="inputName" value=""/><br/>
		Description<input type="text" name="inputDesc" value=""/><br/>
		<br/>
		<input type="submit" name="submit" />

	</form>