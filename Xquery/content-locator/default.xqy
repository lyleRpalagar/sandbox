xquery version "1.0-ml";

import module namespace contentLocator = 'http://lds.org/code/content-locator' at 'functions/content-locator-functions.xqy';
import module namespace rw = 'http://lds.org/code/content-locator/rewrite-rules' at 'functions/rewrite-rules-functions.xqy';
import module namespace imagesLocator = 'http://lds.org/code/content-locator/images' at 'functions/images-locator.xqy';
import module namespace config = 'http://lds.org/code/content-locator' at 'functions/config.xqy';
import module namespace errors = 'http://lds.org/code/content-locator' at 'errors/error.xqy';

declare namespace zip = "xdmp:zip";
declare namespace http = "xdmp:http";

declare variable $local:zip as item()? := local:getZip();
declare variable $local:url as xs:string? := xdmp:get-request-field('url');
declare variable $local:urlPath as xs:string? := contentLocator:removeHost($local:url);
declare variable $local:postUrl as xs:string := local:postUrl();

declare function local:postUrl() as xs:string {
	fn:concat(
		config:http-request(), 
		"shared/content-locator/get-content.xqy?url=",
		xdmp:url-encode($local:url), 
		if (xdmp:get-request-field("getImages")) 
			then "&amp;getImages=1" else (), 
		if (xdmp:get-request-field("getRewriteRules")) 
			then "&amp;getRewriteRules=1" else ()
		)	
};

declare function local:getZip() as item()? {
	let $url := $local:url
	where (fn:string-length($url) gt 0)
		return
			(: Send request :)
			let $http as xs:string := $local:postUrl
			let $_ := xdmp:trace('content-locator', 'Sending request to: ' || $http)
		    let $request := xdmp:http-post($http)

			where fn:contains($request[1]/http:headers/http:application/xs:string(.), "zip")
			return $request[2]
};

declare function local:getRewriteDiv($zipOutput as item()*) as element() {
	(: This combination is necessary.  Because the transaction is not yet complete, we cannot read the DB.  getRuleConflicts() get's the old from the DB, while the $zipOutput must pass in the new ones, since they are not available to be ready yet from the DB, due to transaction still being open. :)
	let $conflicts := (rw:getRuleConflicts(), $zipOutput[fn:node-name(.) = xs:QName('rewriteRules')]/conflict)
	where $conflicts
	return <div class="toggleWrapper rewriteRulesWrapper">
		<a class="toggler selected">Rewrite Rule Conflicts</a>
		<div class="content">
			<form action="/shared/content-locator/ajax/rewriteRulesOverride.xqy" method="GET">
				<table width="100%">
				<tr><td>Existing in DB</td><td>Imported Conflict</td></tr>
				<tr><td></td><td><label for="rewrite__checkall"><input type="checkbox" id="rewrite__checkall"> Check All</input></label></td></tr>
				{
					for $conflict at $index in $conflicts
						let $locale as xs:string := $conflict/../@locale/xs:string(.)
						let $context as xs:string := (rw:getContextFromUri(fn:base-uri($conflict)), ($conflict/../@context/xs:string(.)))[1]
						let $oldRule := rw:getRuleFromConflict($conflict, $locale, $context)[1]
						let $quotedConflict as xs:string := xdmp:quote($conflict/<rule>{./@*,./node()}</rule>)
						return <tr>
							<td>{xdmp:quote($oldRule)}</td>
							<td>
								<label>
									<input type="checkbox" id="conflict{$index}" name="conflict--{$index}" value='{xdmp:quote($conflict)}'>{$quotedConflict}</input>
								</label>
								<input type="hidden" name="conflictContext--{$index}" value="{$context}"/>
								<input type="hidden" name="conflictLocale--{$index}" value="{$locale}"/>
							</td>
						</tr>
				}
				<tr><td></td><td>
					<select name="action">
						<option value="override">Override with selected imported rule(s) above</option>
						<option value="discard">Discard selected imported rule(s) above</option>
					</select>
					<input type="submit" value="Complete Action"/>
				</td></tr>
				</table>
				</form>
			</div>
		</div>
};

declare function local:getImagesDiv() as element(div)? {
	let $imagesWanted as xs:boolean := (xdmp:get-request-field("getImages") eq "1")
	where $imagesWanted
	return
		<div class="toggleWrapper imagesWrapper">
			<a class="toggler">Downloaded images</a>
			<div class="content hide">
				{
					let $images := fn:distinct-values(imagesLocator:getFromZip($local:zip)//*:to/xs:string(.))
					return
						if ($images)
						then
							for $img as xs:string in $images
							return <div class="imgContainer">
								<img src="/shared/content-locator/ajax/fetchAndSaveImage.xqy?url={$local:url}&amp;uri={$img}" alt="{$img}" onload="this.parentNode.classList.remove('downloading'); this.parentNode.classList.add('done');"/>
							</div>
						else "There were no images to download..."
				}
			</div>
		</div>
};

declare function local:getXmlDiv() as element(div) {
	let $files as xs:string* := xdmp:zip-manifest($local:zip)//zip:part/xs:string(.)
	return
		<div class="xmlWrapper toggleWrapper">
			<a class="toggler">Downloaded XML files</a>
			<div class="content hide">
				<strong>Count: {fn:count($files)} file(s)</strong>
				<ul>
					{($files ! <li>{.}</li>)}
				</ul>
			</div>
		</div>
};

declare function local:getLocalLink() as element()? {
	let $show := fn:string-length($local:urlPath)
	where $show
	return
		<div>Local files now available: <a href="{$local:urlPath}" target="_BLANK">{$local:urlPath}</a></div>
};

xdmp:set-response-content-type("text/html"),
xdmp:add-response-header("Cache-Control", "no-cache, no-store, must-revalidate"),
xdmp:add-response-header("Pragma", "no-cache"),
xdmp:add-response-header("Expires", "0"),
(: Placed here for use anywhere below :)
let $unzippedResults as item()* := if($local:zip) then contentLocator:uploadZip($local:zip) else ()
return
('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	    <head>
	      <link rel="stylesheet" type="text/css" href="/shared/content-locator/css/default.css" />
	      <link rel="stylesheet" type="text/css" href="/shared/content-locator/css/custom.css" />
	    </head>
	    <body>
		    <div id="wrapper">
		        <div id="setting-wrapper">
				   {config:settings()}
				</div>
	           <div class="main-form">
				 <form action="" method="POST">
		           <label for="name">URL:</label>
		            <input type="text" name="url" placeholder="https://www.lds.org/topics/?lang=eng" value="{xdmp:get-request-field("url")}"/>
		            <input type="submit" name="submit" value="Populate"/>
                        <div id ="cog_icon">
                            <svg id="cog-toggle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 84 84" xml:space="preserve">
                            	<g>
                            		<path d="M75.921,42c0-5.237,3.224-9.372,8.079-12.213c-0.874-2.923-2.033-5.723-3.459-8.36
                                     c-5.444,1.425-9.851-0.708-13.555-4.412S62.148,8.903,63.573,3.46c-2.635-1.427-5.435-2.586-8.36-3.46
                                     C52.371,4.856,47.238,8.08,42,8.08C36.763,8.08,31.63,4.857,28.787,0c-2.923,0.873-5.723,2.033-8.359,3.458
                                     c1.424,5.444,0.291,9.852-3.413,13.557c-3.704,3.704-8.112,5.837-13.556,4.414C2.033,24.063,0.874,26.864,0,29.788
                                     C4.855,32.628,8.079,36.764,8.079,42S4.855,52.371,0,55.213c0.874,2.924,2.033,5.724,3.459,8.361
                                     c5.444-1.425,9.852-0.291,13.556,3.413c3.703,3.705,4.837,8.111,3.413,13.555c2.636,1.425,5.436,2.586,8.36,3.458
                                     c2.843-4.855,7.975-8.08,13.212-8.08c5.238,0,10.371,3.225,13.213,8.08c2.925-0.874,5.725-2.033,8.361-3.46
                                     c-1.424-5.442-0.292-9.849,3.412-13.554c3.704-3.704,8.111-5.838,13.555-4.413c1.426-2.637,2.585-5.437,3.459-8.361
                                     C79.145,51.371,75.921,47.237,75.921,42z M42,60.266c-10.087,0-18.265-8.178-18.265-18.266S31.912,23.734,42,23.734
                                     S60.265,31.912,60.265,42C60.265,52.088,52.088,60.266,42,60.266z" fill="#808083"/>
                            	</g>
                            </svg>
                        </div>
		           <div class="main-form__options">
		            <label><input type="checkbox" name="getImages" value="1">{if(xdmp:get-request-field("getImages") eq "1") then attribute checked { "true" } else ()}</input> Download BC images</label>
		            <label><input type="checkbox" name="getRewriteRules" value="1">{if(xdmp:get-request-field("getRewriteRules") eq "1") then attribute checked { "true" } else ()}</input> Download rewrite rules ("ALL" and lang specified in URL above)</label>
		            <h6><i>*to specify a language use &quot; ?lang=zho &quot; at the end of your search</i></h6>
		            </div>
		         </form>
			   </div>
				<div class="output">
				{
					local:getLocalLink(),
		        	let $show := fn:exists($local:url)
					where $show
					return
						if ($local:zip)
						then (local:getXmlDiv(),
							local:getImagesDiv())
						else 
							<div class="error">
								<p>Oops, Something is wrong with the zipping process!</p>
								<p>Zip could not be downloaded from {$local:postUrl}</p>
							</div>,
					local:getRewriteDiv($unzippedResults)
				}
				</div>
		    </div>
	    </body>
		<script type="text/javascript" src="/shared/content-locator/js/custom.js"></script>
	</html>
   )
