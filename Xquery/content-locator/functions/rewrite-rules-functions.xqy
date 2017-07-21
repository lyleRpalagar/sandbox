xquery version "1.0-ml";

module namespace rw = 'http://lds.org/code/content-locator/rewrite-rules';

declare option xdmp:mapping "false";

declare function rw:getRules($locale as xs:string+, $context as xs:string+) as element(rewriteRules)* {
	cts:search(/rewriteRules,
		cts:and-query((
			cts:element-attribute-value-query(xs:QName('rewriteRules'), xs:QName('locale'), $locale),
			cts:directory-query($context, "infinity")
		))
	)
};

declare function rw:getRuleConflicts() as element(conflict)* {
	cts:search(/rewriteRules/conflict, ())
};

declare function rw:getRuleFromConflict($conflict as element(conflict), $locale as xs:string, $context as xs:string) as element(rule)* {
	cts:search(/rewriteRules/rule,
		cts:and-query((
			cts:directory-query($context, "infinity"),
			for $attr in $conflict/@*
			return 
				cts:element-attribute-value-query(xs:QName('rule'), xs:QName(fn:local-name($attr)), $attr)
		))
	)[parent::rewriteRules/@locale = $locale]
};

declare function rw:getConflictFromConflict($conflict as element(conflict), $locale as xs:string, $context as xs:string) as element(conflict)* {
	cts:search(/rewriteRules/conflict,
		cts:and-query((
			cts:directory-query($context, "infinity"),
			for $attr in $conflict/@*
			return 
				cts:element-attribute-value-query(xs:QName('conflict'), xs:QName(fn:local-name($attr)), $attr)
		))
	)[parent::rewriteRules/@locale = $locale]
};

declare function rw:getContextFromUri($uri as xs:string) as xs:string {
	"/" || fn:tokenize($uri, "/")[2] || "/"
};

(: Find where a rewriteRules file exists, so we can insert a new document in roughly the same location :)
declare function rw:getRewriteRulesPath($locale as xs:string, $context as xs:string) as xs:string? {
	let $existing as xs:string? := cts:uris((), ("limit=1"),
	    cts:and-query((
	        cts:element-query(xs:QName('rewriteRules'), cts:and-query(())),
	    	cts:directory-query($context, "infinity")
	    ))
	  )
	let $dir as xs:string := if ($existing)
		then fn:string-join(fn:tokenize($existing, "/")[1 to fn:last() - 1], "/") || "/"
		else $context
	let $timestampNum as xs:string := fn:replace(xs:string(fn:current-dateTime()), "\D", "")
	let $fileName as xs:string := "rewrite_imported_" || $locale || "_" || $timestampNum || ".xml"
	return  fn:concat($dir, $fileName)
};

(: Get rid of duplicates between the two sets, and if a rule with a certain @path exists in both (but the /text() is different), then mark it as a <conflict>
$left is for new rules coming in, $right is for old rules already in place
:)
declare function rw:getFiltered($left as element(rule)*, $right as element(rule)*) as element()* {
	(: Put all rules into maps :)
	let $mapLeft := map:new($left ! map:entry(@path, .))
    let $mapRight := map:new($right ! map:entry(@path, .))

    (: Set differences - only distinct values left now (distinct = key+value are distinct, but may be duplicate keys and/or values) :)
    let $cleanRight := ($mapRight - $mapLeft)
    let $cleanLeft := ($mapLeft - $mapRight)

    (: If a key exists in both, that means the @path was the same for left/right, but the /text() was different.  For that case, mark this element as a <conflict>, keeping all the attributes + /text() from the rule.  If the @path exists in one, but not the other, that means it's new, and keep it just as is.  :)
    return (map:keys($cleanLeft) ! (map:get($cleanRight, .)/<conflict>{map:get($cleanLeft, ./@path)/(@*|node())}</conflict>, map:get($cleanLeft, .))[1])
};

(: Compares a new set of rewriteRules with previous rewriteRules, adding all new rules, and returning conflicts.
Conflict would be: a @path from the left is on the right, but they point to different files
Note that duplicates are ignored.
$left is for new rules coming in, $right is for old rules already in place
returns: rewriteRules (clean, unique, with conflicts in place of rules that have the same @path, but different destination files (/text())
 :)
declare function rw:removeConflicts($left as element(rewriteRules)*, $right as element(rewriteRules)*, $env as xs:string) as element(rewriteRules) {
	let $filtered := rw:getFiltered($left/rule, $right/rule)
	return
		element rewriteRules {
			$left/@*,
			comment {
				"Imported from " || $env || " on " || fn:current-dateTime() || " using the content-locator tool"
			},
			$filtered
		}
};
