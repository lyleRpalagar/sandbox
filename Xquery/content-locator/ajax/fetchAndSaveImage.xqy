import module namespace images = 'http://lds.org/code/content-locator/images' at '../functions/images-locator.xqy';

let $url as xs:string? := xdmp:get-request-field('url')
let $uri as xs:string? := xdmp:get-request-field('uri')
where $url and $uri
return 
  let $download := images:downloadImages($url, $uri)
  return 
    (xdmp:set-response-content-type(xdmp:uri-content-type($uri)),
    xdmp:add-response-header("Content-Transfer-Encoding",'binary'),
    $download)
