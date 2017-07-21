module namespace images = 'http://lds.org/code/content-locator/images';

import module namespace fs = "http://lds.org/code/shared/common/document/filesystem-doc-functions" at "/shared/common/document/filesystemDocFunctions.xqy";
import module namespace config = 'http://lds.org/code/content-locator' at 'config.xqy';

declare namespace http = "xdmp:http";
declare namespace ldse = "http://lds.org/code/lds-edit";

(: -------------- CLIENT functions -------------- :)
declare function images:getFromZip($zip as item()?) as element(images)? {
   xdmp:zip-get($zip, "/images.xml",
          <options xmlns="xdmp:zip-get">
            <format>{ xdmp:uri-format("/images.xml") }</format>
          </options>)/images
};

declare function images:downloadImages($url as xs:string, $uris as xs:string*) as item()* {
  let $host as xs:string := fn:replace(config:http-request(), "/$", "")
  let $prepend as xs:string := fn:replace($host, "preview(-|\.)", "")
  return for $image as xs:string in $uris
    let $imgHttp as xs:string := fn:concat($prepend, xdmp:url-encode($image, fn:true()))
    let $fsPath as xs:string := fn:replace($image, "/bc/", "/opt/bc/")
    let $log as empty-sequence() := xdmp:trace('content-locator', 'Fetching image ' || $imgHttp || ' to ' || $fsPath)
    let $binary as item() := xdmp:document-get($imgHttp)/node()
    let $saveImg as empty-sequence() := fs:save($fsPath,$binary)
    return $binary
};

(: -------------- SERVER functions -------------- :)
declare function images:getImagesUsedInFiles($uris as xs:string*) as element(img)* {
  for $img in fn:doc($uris)//(element()[fn:starts-with(fn:string(.), "/bc/")]|*:img[fn:starts-with(./@src/xs:string(.), "/bc/")]/@src)
  where fn:not(fn:contains(fn:lower-case($img), ".pdf"))
  return <img><from>{fn:base-uri($img)}</from><to>{xs:string($img)}</to></img>
};

declare function images:getAllTokenizedFolderPaths($paths as xs:string*) as xs:string* {
  let $paths as xs:string* := fn:distinct-values(
      for $path in $paths
      return fn:string-join(
        fn:tokenize(
          fn:substring-after($path, "/bc/content"),
          "/")[1 to fn:last() - 1],
        "/")
      )
  let $tokenizedPaths as xs:string* := fn:distinct-values(for $path in $paths
    return
        fn:fold-left(function($total, $node){
        ($total, $total[fn:last()] || "/" || $node)
      }, (), fn:tokenize($path, "/")[2 to fn:last()]))

  return $tokenizedPaths
};

declare function images:getBCXmls($uris as xs:string*, $lang as xs:string?) as element(binary-content)* {
  cts:search(/binary-content, 
    cts:and-query((
      cts:element-attribute-value-query(xs:QName("binary-content"), xs:QName("locale"), $lang, "exact"),
      cts:element-value-query(xs:QName("path"), for $uri in $uris return fn:substring-after($uri, "/bc/content"), "exact")
    ))
  )
};

declare function images:getBCXmlsForFolders($tokenizedPaths as xs:string*) as element(ldse:bc-folder)* {
  cts:search(/ldse:bc-folder, 
    cts:element-value-query(xs:QName("ldse:path"), 
      $tokenizedPaths, 
        "exact")
  )
};
