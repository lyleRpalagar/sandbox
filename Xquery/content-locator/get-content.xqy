xquery version "1.0-ml";

import module namespace contentLocator = 'http://lds.org/code/content-locator' at 'functions/content-locator-functions.xqy';
import module namespace config = 'http://lds.org/code/content-locator' at 'functions/config.xqy';
import module namespace errors = 'http://lds.org/code/content-locator' at 'errors/error.xqy';
import module namespace imagesLocator = 'http://lds.org/code/content-locator/images' at 'functions/images-locator.xqy';
import module namespace rw = 'http://lds.org/code/content-locator/rewrite-rules' at 'functions/rewrite-rules-functions.xqy';

let $url as xs:string? := xdmp:url-decode(xdmp:get-request-field('url'))
let $uri as xs:string? := contentLocator:getUri($url)
let $lang as xs:string? := contentLocator:getLang($url)
let $root-elements as xs:QName* := config:qname()
let $getImages as xs:boolean := xs:boolean((xdmp:get-request-field('getImages'), fn:false())[1])
let $getRewriteRules as xs:boolean := xs:boolean((xdmp:get-request-field('getRewriteRules'), fn:false())[1])

let $uris as xs:string* := 
	let $files := contentLocator:query($uri, $lang, $root-elements)
	let $rewriteRules as xs:string* := 
		if ($getRewriteRules)
		then (rw:getRules($lang, ("/preview/", "/published/")), rw:getRules("ALL", ("/preview/", "/published/")), rw:getRules("GLOBAL", ("/preview/", "/published/")))/fn:base-uri(.)
		else ()
	return ($files, $rewriteRules)

let $images as element(images)? := 
	if ($getImages)
	then <images>{imagesLocator:getImagesUsedInFiles($uris)}</images>
	else ()

let $zipping := if ($uris)
	then contentLocator:zipping($uris, $images, $lang)
	else xdmp:trace('content-locator', 'Error: No file(s) found')

return  $zipping