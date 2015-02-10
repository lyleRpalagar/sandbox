<?php 
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "lylepalagar@aol.com";
    $to = "lylepalagar@aol.com";
    $subject = "PHP Mail Test script";
    $message = '<div class="email-background" style="background: #eee;padding: 10px;">
		<div class="pre-header" style="max-width: 500px;font-family: sans-serif;font-size: 5px;background: #eee;color: #eee;">
			Mobile Notaries, In need of a professional website? www.pkquality.com can create and maintain your professional website for you at an affortable price.
		</div> 
		<div class="email-container" style="max-width: 500px;margin: 0 auto;font-family: sans-serif;overflow: hidden;border-radius: 5px;">
			<p style="margin: 20px;font-size: 16px;text-align: justify;color: #666;line-height: 1.5;font-weight: 300;">PkQuality believes that every business is unique in their own way. We accommodate our services to help our clients get the best experience for an affordable price. PkQuality follows the guidelines that <a href="http://www.123notary.com/howtocreatewebsite.htm">123notary.com</a> provides so that we can give you the needed services to enhance your web presence. Click on the link below for more details about our business and what we offer to all our clients.</p>

				<div class="cta" style="text-align: center;margin: 20px;">
						<a href="http://www.pkquality.com/prices/" style="text-decoration: none;display: inline-block;background: #0066FF;color: white;padding: 10px 20px;border-radius: 5px;"> Build My Website Now! </a>
				</div>


<div class="package" style="background-color:white; padding:20px;margin:10px;">
		<h2 style="color:#BDBAB4;">Silver</h2>
		<ul>
			<li style="list-style-type: square;color: #666;">3 page website (design &amp; build)</li>
			<li style="list-style-type: square;color: #666;">Purchase/transfer Domain Name 1 year</li>
			<li style="list-style-type: square;color: #666;">1 year hosting</li>
			<li style="list-style-type: square;color: #666;">1 year maintenance (minor changes)</li>
			<li style="list-style-type: square;color: #666;"> - - - </li>
			<li style="list-style-type: square;color: #666;"> - - - </li>
			<li style="list-style-type: square;color: #666;"> - - - </li>
		</ul>
		<div class="pricing" style="color:#BDBAB4; font-size:32px;text-align:right;"> $175.00 </div>
</div>
<div class="package" style="background-color:white; padding:20px;margin:10px;">
		<h2 style="color:#FFCC00;">Gold</h2>
		<ul>
			<li style="list-style-type: square;color: #666;">3 page website (design &amp; build)</li>
			<li style="list-style-type: square;color: #666;">Purchase/transfer Domain Name 1 year</li>
			<li style="list-style-type: square;color: #666;">1 year hosting</li>
			<li style="list-style-type: square;color: #666;">1 year maintenance (minor changes)</li>
			<li style="list-style-type: square;color: #666;">Custom Logo</li>
			<li style="list-style-type: square;color: #666;">Business card designed (printing of cards extra)</li>
			<li style="list-style-type: square;color: #666;"> - - -</li>
		</ul>
		<div class="pricing" style="color:#FFCC00; font-size:32px;text-align:right;"> $250.00 </div>
</div>
<div class="package" style="background-color:white; padding:20px;margin:10px;">
		<h2 style="color:#1C75BC;">Platinum</h2>
		<ul>
			<li style="list-style-type: square;color: #666;">3 page website (design &amp; build)</li>
			<li style="list-style-type: square;color: #666;">Purchase/transfer Domain Name 1 year</li>
			<li style="list-style-type: square;color: #666;">1 year hosting</li>
			<li style="list-style-type: square;color: #666;">1 year maintenance (minor changes)</li>
			<li style="list-style-type: square;color: #666;">Custom Logo</li>
			<li style="list-style-type: square;color: #666;">Set up on two social media sites (LinkedIn, Facebook, Twitter, etc.)</li>	
			<li style="list-style-type: square;color: #666;">Custom Brochure, Postcard or other marketing collateral</li>		
		</ul>
		<div class="pricing" style="color:#1C75BC; font-size:32px;text-align:right;"> $400.00 </div>
</div>
<p class="payment-message" style="text-align:center;color:#666; font-size:12px;"><i> Payments accepted but 50% down is needed on all packages, before any services can be provided. I Accept credit cards &amp; PayPal.</i>
</p>


		<p style="padding-top:20px;margin: 20px;font-size: 16px;text-align: center;color: #666;line-height: 1.5;font-weight: 300;">Get found online! with your very own professional website. </p>
				<div class="cta" style="text-align: center;margin: 20px;">
						<a href="http://www.pkquality.com/prices/" style="text-decoration: none;display: inline-block;background: #0066FF;color: white;padding: 10px 20px;border-radius: 5px;"> Build My Website Now! </a>
				</div>

		</div> 
<div class="footer" style="color: #666;font-size: 12px;">
	&copy; 2014 PkQuality
</div>
	</div> ';
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "Test email sent";
?>