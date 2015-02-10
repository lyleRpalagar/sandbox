<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="LightBox | Template">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<title> Light Box | Template </title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> <!-- this calls jquery remotely -->
		<script type="text/javascript">
/* explaination of this code found 
/* http://kilianvalkhof.com/2008/javascript/building-your-own-lightbox-part-1/ */

		$(location).attr('href');      // http://www.refulz.com:8082/index.php#tab2
  		$(location).attr('pathname');  // lightBoxTemplate.php
  		// code ^^ is needed , so that when the 'href' is clicked it will overlay the pic on the same page rather than in a new tab

			$(document).ready(function(){
			// add a click event
				$(".lightbox").click(function(){
					overlayLink = $(this).attr("href");
					window.startOverlay(overlayLink);
					return false;
				});
			});

			function startOverlay(overlayLink) {
			//add the elements to the dom
				$("body")
					.append('<div class="overlay"></div><div class="container"></div>')
					.css({"overflow-y":"hidden"});

			//animate the semitransparant layer
				$(".overlay").animate({"opacity":"0.6"}, 400, "linear");

			//add the lightbox image to the DOM
				$(".container").html('<img src="'+overlayLink+'" alt="" />');

			//position it correctly after downloading
				$(".container img").load(function() {
					var imgWidth = $(".container img").width();
					var imgHeight = $(".container img").height();
					$(".container")
						.css({
							"top":        "50%",
							"left":       "50%",				
							"width":      imgWidth,
							"height":     imgHeight,
							"margin-top": -(imgHeight/2),
							"margin-left":-(imgWidth/2) //to position it in the middle
							
						})
						.animate({"opacity":"1"}, 400, "linear");

			// you need to initiate the removeoverlay function here, otherwise it will not execute.
					window.removeOverlay();
				});
			}
			function removeOverlay() {
			// allow users to be able to close the lightbox
				$(".overlay").click(function(){
					$(".container, .overlay").animate({"opacity":"0"}, 200, "linear", function(){
						$(".container, .overlay").remove();	
					});
				});
			}
			/* fin. */

	</script>


		<style type="text/css">

		/*lightBox Customization */
			.overlay {
				position:absolute;
				top:0;
				left:0;
				height:100%;
				width:100%;
				background:#000;
				opacity:0;
				filter:alpha(opacity=0);
				z-index:50;
			}
			.container {
				position:absolute;
				opacity:0;
				filter:alpha(opacity=0);
				left:-9999em;
				z-index:51;
			}
			/* fin. */
			 #holder{
				height: 50px;
				width: 250px;
				background: #c9de96; /* Old browsers */
				background: -moz-linear-gradient(top, #c9de96 0%, #8ab66b 44%, #398235 100%); /* FF3.6+ */
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#c9de96), color-stop(44%,#8ab66b), color-stop(100%,#398235)); /* Chrome,Safari4+ */
				background: -webkit-linear-gradient(top, #c9de96 0%,#8ab66b 44%,#398235 100%); /* Chrome10+,Safari5.1+ */
				background: -o-linear-gradient(top, #c9de96 0%,#8ab66b 44%,#398235 100%); /* Opera 11.10+ */
				background: -ms-linear-gradient(top, #c9de96 0%,#8ab66b 44%,#398235 100%); /* IE10+ */
				background: linear-gradient(to bottom, #c9de96 0%,#8ab66b 44%,#398235 100%); /* W3C */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9de96', endColorstr='#398235',GradientType=0 ); /* IE6-9 */
				margin:0px;
				box-shadow: 5px 5px 5px #888888;
			 }
		 	#lightBox{
		 		margin-left:60px;
		 		margin-top:10px;
		 	}

		</style>
	</head>
	<body>
		<!-- oooooooooooooooooooooooooooooooooooooooooooooo LightBox Template Copy & Paste oooooooooooooooooooooooooooooooooooooooooo -->

		<div id="holder">
			<div id="lightBox">
			<a href="img/Desert.jpg" class="lightbox"><h1>Lightbox!</h1></a>
			</div>
	    </div>


		<!-- oooooooooooooooooooooooooooooooooooooooooooooo /end  Copy & Paste ooooooooooooooooooooooooooooooooooooooooooooooooooooooo -->


	</body>


</html>



