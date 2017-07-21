xquery version "1.0-ml";
module namespace test = "http://github.com/robwhitby/xray/test";

import module namespace assert = "http://github.com/robwhitby/xray/assertions" at "/shared/xray/assertions.xqy";
(: import modules for syntax checking :)
import module namespace contentLocator = 'http://lds.org/code/content-locator' at '/shared/content-locator/functions/content-locator-functions.xqy';
import module namespace images = 'http://lds.org/code/content-locator/images' at '/shared/content-locator/functions/images-locator.xqy';
import module namespace config = 'http://lds.org/code/content-locator' at '/shared/content-locator/functions/config.xqy';

declare namespace zip = "xdmp:zip";
declare namespace http = "xdmp:http";
declare namespace ldse = "http://lds.org/code/lds-edit";

(: The following tests will check  take in url or uri and return the uri of  
   the input without the beggining slash. :)
declare %test:case function getUri(){	
	assert:equal(contentLocator:getUri('http://www.lds.org/topics?lang=zho'), "/topics"),
	assert:equal(contentLocator:getUri('https://www.lds.org/topics?lang=zho'), "/topics"),
	assert:equal(contentLocator:getUri('www.lds.org/topics/scriptures?lang=zho'), "/topics/scriptures"),
	assert:equal(contentLocator:getUri('/topics?lang=zho'), "/topics"),
	assert:equal(contentLocator:getUri('/topics/scriptures?lang=zho'), "/topics/scriptures"),
    assert:equal(contentLocator:getUri('/topics'), "/topics")
};

(: The following test will check to see if you can query a file :)
declare %test:case function query(){
	let $qname as xs:QName := xs:QName('ldse:document')
    return assert:not-empty(contentLocator:query('topics', 'zho', $qname))
};

(: The following test will check to see if sending a response will give back a reply that is a zip binary :)
declare %test:case function zipping(){
	let $path := "/shared/content-locator/get-content.xqy?url=http://www.lds.org/topics?lang=zho"
    let $host := get-host()
    (: when running this over xdbc the protocol is xdbc - replace with http :)
    let $protocol := fn:replace((xdmp:get-request-protocol(), "http")[1], "xdbc", "http")
    let $url := fn:concat($protocol, '://', $host, $path)
    let $response := xdmp:http-get($url)
	return assert:true(xdmp:node-kind($response[2]/node()) = 'binary')
};

(: the following test will check to see if the reply sent by the response will give back a zip if it is a zip the file will upload the file:)
declare %test:case function uploadZip(){
   let $path := "/shared/content-locator/get-content.xqy?url=http://www.lds.org/topics?lang=zho"
   let $host := get-host()
   let $protocol := fn:replace((xdmp:get-request-protocol(), "http")[1], "xdbc", "http")
   let $url := fn:concat($protocol, '://', $host, $path)
   let $response := xdmp:http-get($url)
   return assert:true($response[1]/http:headers/http:application/xs:string(.) = 'zip')
};

declare %test:case function configFile(){
   assert:not-empty(config:configFile())
};

declare %test:case function configLimit(){
   assert:not-empty(config:configFile()),
   assert:true(number(config:limit()) = config:limit() )
};

declare %test:case function getAllTokenizedFolderPaths(){
  let $strings1 as xs:string* := ("/bc/content/pathway/to/heaven.jpg", "/bc/content/stairway/to/heck.png")
  let $expected1 as xs:string* := ("/pathway", "/pathway/to", "/stairway", "/stairway/to")
  let $test1 := assert:equal(images:getAllTokenizedFolderPaths($strings1), $expected1)

  let $strings2 as xs:string* := ("/bc/content/heaven.jpg")
  let $expected2 as xs:string* := ()
  let $test2 := assert:equal(images:getAllTokenizedFolderPaths($strings2), $expected2)

  let $strings3 as xs:string* := ("/bc/content/pathway/to/heaven.jpg", "/bc/content/stairway/to/heck.png", "/bc/content/stairway/from/heck.png", "/bc/content/stairway/from/heaven.png", "/bc/content/road/to/the/riverton/building/cool.gif")
  let $expected3 as xs:string* := ("/pathway", "/pathway/to", "/stairway", "/stairway/to", "/stairway/from", "/road", "/road/to", "/road/to/the", "/road/to/the/riverton", "/road/to/the/riverton/building")
  let $test3 := assert:equal(images:getAllTokenizedFolderPaths($strings3), $expected3)

  return ($test1, $test2, $test3)
};

declare function get-host() {
    let $host-parts :=
        fn:tokenize(
            xdmp:get-request-header("host", "localhost:8460"),
            ':'
        )
    return fn:string-join( ("localhost", $host-parts[2]), ':')
};

declare %test:case function removeHost(){
  let $url1 := "https://lds.org/topics?lang=eng"
  let $url2 := "lds.org/topics?lang=eng"
  let $url3 := "/topics?lang=spa#watch=this"
  let $url4 := "http://www.lds.org/topics?lang=fra"
  let $url5 := "topics?lang=fra"
  let $url6 := "lds.org?lang=ger"

  let $expected1 := "/topics?lang=eng"
  let $expected2 := "/topics?lang=eng"
  let $expected3 := "/topics?lang=spa#watch=this"
  let $expected4 := "/topics?lang=fra"
  let $expected5 := "/topics?lang=fra"
  let $expected6 := "/?lang=ger"

  let $test1 := contentLocator:removeHost($url1)
  let $test2 := contentLocator:removeHost($url2)
  let $test3 := contentLocator:removeHost($url3)
  let $test4 := contentLocator:removeHost($url4)
  let $test5 := contentLocator:removeHost($url5)
  let $test6 := contentLocator:removeHost($url6)

  let $assert1 := assert:equal($test1, $expected1)
  let $assert2 := assert:equal($test2, $expected2)
  let $assert3 := assert:equal($test3, $expected3)
  let $assert4 := assert:equal($test4, $expected4)
  let $assert5 := assert:equal($test5, $expected5)
  let $assert6 := assert:equal($test6, $expected6)

  return ($assert1, $assert2, $assert3, $assert4, $assert5, $assert6)
};
