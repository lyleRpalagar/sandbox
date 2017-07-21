xquery version "1.0-ml";

module namespace errors = 'http://lds.org/code/content-locator';

import module namespace config = 'http://lds.org/code/content-locator' at '../functions/config.xqy';


declare function errors:filelimit(
$uris as xs:string*
){
	fn:concat('Error your file size is too big, try a smaller search. ', 
		      '&#13;&#10;requested file was: ',
		      fn:count($uris),
		      ' the limit is: ',
		      config:limit(),
	          '. Try being more specific in your search')
};

declare function errors:nofilefound(
$uri as xs:string?,
$lang as xs:string?
){
    fn:concat('No file found for uri: "', $uri, '" in lang: "', $lang, '"')
};

declare function errors:zippingerror(
$url as xs:string?
) as xs:string {
    fn:concat('Oops, Something is wrong with the zipping process! 
     Check the test cases to make sure your functions are all passing. &#13;&#10;
     File may not have been found for the given result: ' ,  $url)
};