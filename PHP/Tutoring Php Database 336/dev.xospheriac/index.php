<?php
  
	 try{
	   require $_SERVER['DOCUMENT_ROOT'].'/model/dbconnect.php';
	   require $_SERVER['DOCUMENT_ROOT'].'/controller/function.php';
	 }
	  catch(Exception $ex){
	     Header('Location: /view/errordocs/500.shtml');
	  } 

    $action = $_GET['action'];
    
    switch($action){
        case 'home':
        		$info = getPage($action);
        break;
       			 case 'about':
						$info = getPage($action);
        		 break;
        		       case 'contact':
							$info = getPage($action);
        			   break;
        			   		 case 'policy':
									$info = getPage($action);
        			   		 break;
        default: header('Location: index.php?action=home');
        }
        $h1 = $info['h1'];
        $h2 = $info['h2'];
        $h3 = $info['h3'];
        $column1 = $info['column1'];
        $column2 = $info['column2'];
        $column3 = $info['column3'];
        $column4 = $info['column4'];
        $column5 = $info['column5'];

?>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8"/>
			<title><?php echo $action; ?> | Xospheriac</title>
			<link rel="stylesheet" type="text/css" href="/css/main.css"/>
			<script type="text/javascript" src="/js/main.js"></script>
		</head>
		<body onload="getHeight()">
			<div id="wrapper">
				<div id="nav">
						<?php include "includes/nav.php"; ?>	
				</div>
				<div id="container">
						<div id="column1">
							<?php echo $h1; ?>
							<?php echo $column1; ?>
						</div>
							<div class="clear"></div>
						<div id="column2">
						 <?php echo $h2;?>
						 <?php echo $column2; ?>
						</div>
						<div id="column3">
							<?php echo $h3;?>
							<?php echo $column3; ?>
						</div>
						<div id="column4">
							<?php echo $column4; ?>
						</div>
						<div id="column5">
							<?php echo $column5; ?>
						</div>
               </div>
				<div class="clear"></div>		
				<div id="footer">
					<?php include "includes/footer.php"; ?>
				</div>
		  </div> <!-- wrapper -->
		</body>
</html>