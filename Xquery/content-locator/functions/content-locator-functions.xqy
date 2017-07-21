xquery version "1.0-ml";

module namespace contentLocator = 'http://lds.org/code/content-locator';

import module namespace config = 'http://lds.org/code/content-locator' at 'config.xqy';
import module namespace errors = 'http://lds.org/code/content-locator' at '../errors/error.xqy';
import module namespace imagesLocator = 'http://lds.org/code/content-locator/images' at 'images-locator.xqy';
import module namespace rw = 'http://lds.org/code/content-locator/rewrite-rules' at 'rewrite-rules-functions.xqy';

declare namespace zip = "xdmp:zip";

declare option xdmp:mapping "true";

(: Grabs URL, Converts It To URI
   @url
:)
declare function contentLocator:getUri(
  $url as xs:string?
) as xs:string? {
  fn:replace(contentLocator:removeHost($url), "(\?|#).*", "")
};

declare function contentLocator:removeHost($uri as xs:string) as xs:string {
  let $takeOutDangerousSlashes as xs:string := fn:replace($uri, "https?://", "")
  return if (fn:contains($takeOutDangerousSlashes, "/"))
    then "/" || fn:substring-after($takeOutDangerousSlashes, "/")
    else "/" || fn:replace($takeOutDangerousSlashes, ".*\.[a-zA-Z]{3}", "")
};


declare function contentLocator:getLang(
  $url as xs:string?
) as xs:string {
  if (fn:matches($url, 'lang='))
    then 
      let $lang as xs:string := fn:replace($url, ".+lang=([a-zA-Z]+).*", "$1")
      return $lang
    else "eng"
};

declare function contentLocator:query(
  $uri as xs:string,
  $lang as xs:string,
  $root-elements as xs:QName*
) as xs:string*{
  contentLocator:query($uri, $lang, $root-elements, config:limit())
};

declare function contentLocator:query(
  $uri as xs:string,
  $lang as xs:string,
  $root-elements as xs:QName*,
  $maxCountAllowed as xs:integer
) as xs:string*{
  fn:distinct-values(contentLocator:query($uri, $lang, $root-elements, 0, $maxCountAllowed))
};
(: 
  cts:search to find content 
  @uri
  @lang
  @root-element
  @currentCount
  @maxCountAllowed
  Note: Can contain duplicate values, and due to this the total unique values may not reach the full file limit
:)
declare function contentLocator:query(
  $uri as xs:string,
  $lang as xs:string,
  $root-elements as xs:QName*,
  $currentCount as xs:integer,
  $maxCountAllowed as xs:integer
) as xs:string*{
  let $base_uris as xs:string* := cts:uris((), (),
          cts:and-query((
            cts:element-attribute-value-query(
              $root-elements, 
              (xs:QName("uri"), xs:QName("data-uri"), xs:QName("page"), xs:QName("custom-page")),
              ($uri, fn:concat('/', $uri), fn:concat('/', $uri, '/'), fn:concat($uri,'/')), 
              "exact"
            ),
            cts:element-attribute-value-query(
              $root-elements, 
              (xs:QName("locale"), xs:QName("lang")), 
              $lang, 
              "exact"
            )
          ))
        )[1 to $maxCountAllowed - $currentCount]
  return ($base_uris, 
    for $doc in fn:doc($base_uris)/element()
    return
      if (fn:local-name($doc) eq "collection")
        then 
          let $collectionBaseUri as xs:string := fn:string-join(fn:tokenize($doc/@uri/xs:string(.), "/")[1 to fn:last() - 1], "/")
          let $itemUris as xs:string* := $doc//items/item/fn:concat($collectionBaseUri, "/", xs:string(.))
          return contentLocator:query($itemUris, $lang, $root-elements, $currentCount + fn:count($base_uris), $maxCountAllowed)
        (: Additional checks for URI dependencies cna go here :)
        else ()
    )
};

(:
   Zipping Process
   @uris
:)
declare function contentLocator:zipping(
  $uris as xs:string*,
  $imageXml as element(images)?,
  $lang as xs:string?
) as binary()* {

  let $filename as xs:string := 'content.zip'

  let $images := $imageXml/img/to/xs:string(.)
  let $tokenizedPaths := imagesLocator:getAllTokenizedFolderPaths($images)
  let $imageFiles := (
      imagesLocator:getBCXmls($images, $lang),
      imagesLocator:getBCXmlsForFolders($tokenizedPaths)
    )

  let $manifest as element(zip:parts) :=
        <parts xmlns="xdmp:zip">{
            for $uri as xs:string in $uris
            return
              element part { $uri },
              if ($imageXml)
                then (
                    <part>/images.xml</part>,
                    $imageFiles/<part>{fn:base-uri(.)}</part>
                  )
                else ()
        }</parts>
  return (
      xdmp:set-response-content-type('application/zip'),
      xdmp:add-response-header("application",'zip'),
      xdmp:add-response-header("Content-Transfer-Encoding",'binary'),
      xdmp:zip-create(
          $manifest,
          (for $uri as xs:string in $uris
          where fn:not(fn:ends-with($uri, ".execute"))
          return     
            fn:doc($uri),
            if ($imageXml)
            then 
              (document { $imageXml },
                $imageFiles/document {.})
            else ()
          )
      )
  )
};

(: 
   Upload Zipping
   @zip
:)
declare function contentLocator:uploadZip(
   $zip as item()?
) as item()* {
  let $manifest as element() := xdmp:zip-manifest($zip)
  return
    for $name in $manifest//zip:part/xs:string(.)
      let $_ := xdmp:trace('content-locator', $name)
      let $doc := xdmp:zip-get($zip, $name,
          <options xmlns="xdmp:zip-get">
            <format>{ xdmp:uri-format($name) }</format>
          </options>
        )/node()
      return
        if (fn:ends-with($name, "/") or $name eq "/images.xml") 
          then ()
        else if ($doc/fn:local-name(.) eq "rewriteRules")
          then 
            let $context as xs:string := rw:getContextFromUri($name)
            let $locale as xs:string := $doc/@locale/xs:string(.)
            let $pre-existing as element(rewriteRules)* := rw:getRules($locale, $context)
            let $cleaned as element(rewriteRules) := rw:removeConflicts($doc, $pre-existing, "TEST")
            let $uri as xs:string := rw:getRewriteRulesPath($locale, $context)
            where fn:exists($cleaned/(rule|conflict))
            return (xdmp:document-insert($uri, $cleaned), $cleaned/<rewriteRules>{@*, attribute context {$context}, ./node()}</rewriteRules>)
        else xdmp:document-insert($name,$doc)
};
