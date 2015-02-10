<?php 
   try{
	 include 'view.php';
	}
	catch(Exception $ex){
		echo 'error, unable to find view.php';
	}
// Matt Brandt PHP Exam 336
	// * Grabs the ?action variable from the get and puts it in a variable called $action
    // which thans get pass through the nav($action) function;
	$action = $_GET['action'];

	// *Grabs whatever has been returned from the nav($action) function and 
	// puts them into the variables h1 and p;
	$info = main($action);
    $h1 = $info[0];
    $p = $info[1];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>View | World Travel Site</title>
  </head>
  <body>
    <header><h1>World Travel Site</h1></header>
    <nav>

    	<ul>
    		<!-- NOTES:
    		     Creating a navigation system that sorts through nav page links and puts them in order
    		     once they are in order , it thens puts the page links in a foreach loop which means 
    		     every page gets put into a 
    		     <li> <a href=""> Page Link </a> </li>
    		     //endof NOTES -->
	    	<?php 
	 		   $continents =['Europe', 'Africa', 'North America', 'Antarctica', 'Asia', 'South America', 'Oceania'];
     		   sort($continents);
     		   array_unshift($continents,'Home');

     		   	  foreach($continents as $continents){
     		   	  	echo '<li><a href="?action='.$continents.'" title="Information about '.$continents.'">'.$continents.'</a></li>';
	    		}

	    	?>
        </ul>

    </nav>
  <main>
    <h1><?php echo $h1; ?></h1>
    <p><?php echo $p; ?> </p>  
  </main>

	<footer>
	    <div id="dateModified">
	        <?php
	        date_default_timezone_set('America/Boise');
	        echo "Last updated: " . date("d M, Y", getlastmod())
	        ?>
	    </div>
	</footer>

  </body>

</html>
