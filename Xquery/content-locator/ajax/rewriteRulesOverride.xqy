import module namespace images = 'http://lds.org/code/content-locator/images' at '../functions/images-locator.xqy';
import module namespace rw = 'http://lds.org/code/content-locator/rewrite-rules' at '../functions/rewrite-rules-functions.xqy';

declare namespace xhtml = "http://www.w3.org/1999/xhtml";

let $fieldNames as xs:string* := xdmp:get-request-field-names()
let $prefix as xs:string := "conflict--"
let $action as xs:string := xdmp:get-request-field("action")
let $conflictMap as map:map := map:new(
	for $fieldName as xs:string in $fieldNames
		where fn:starts-with($fieldName, $prefix)
		return map:entry(fn:replace($fieldName, "\D", ""), xdmp:unquote(xdmp:get-request-field($fieldName))/conflict)
	)
let $_ :=
	for $key in map:keys($conflictMap)
		let $conflict as element(conflict) := map:get($conflictMap, $key)
		let $context as xs:string := xdmp:get-request-field("conflictContext--" || $key)
		let $locale as xs:string := xdmp:get-request-field("conflictLocale--" || $key)
		let $dbConflicts as element(conflict)* := rw:getConflictFromConflict($conflict, $locale, $context)
		return if ($action eq "override")
		then
			let $removeOldRule :=
				let $nodes as element(rule)* := rw:getRuleFromConflict($conflict, $locale, $context)
				for $node in $nodes
					let $fullPath as xs:string := xdmp:path($node, fn:true())
					return (xdmp:trace('content-locator', 'Deleting old rule ' || $fullPath),
						xdmp:node-delete($node))
			(: Change <conflict> to <rule> in new import :)
			let $convertConflict := for $dbConflict in $dbConflicts
				let $fullPath as xs:string := xdmp:path($dbConflict, fn:true())
				return (xdmp:trace('content-locator', 'Converting conflict to rule ' || $fullPath),
					xdmp:node-replace($dbConflict, $dbConflict/<rule>{(./@*,./node())}</rule>))
			return ()
		else if ($action eq "discard")
		then
			(: Remove new conflicts from import :)
			for $dbConflict in $dbConflicts
				let $fullPath as xs:string := xdmp:path($dbConflict, fn:true())
				return (xdmp:trace('content-locator', 'Deleting conflict ' || $fullPath),
				xdmp:node-delete($dbConflict))
		else ()
return xdmp:redirect-response('../../content-locator')
