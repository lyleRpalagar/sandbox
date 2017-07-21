xquery version "1.0-ml";
module namespace test = "http://github.com/robwhitby/xray/test";

import module namespace assert = "http://github.com/robwhitby/xray/assertions" at "/shared/xray/assertions.xqy";
(: import modules for syntax checking :)
import module namespace contentLocator = 'http://lds.org/code/content-locator' at '/shared/content-locator/functions/content-locator-functions.xqy';
import module namespace rw = 'http://lds.org/code/content-locator/rewrite-rules' at '/shared/content-locator/functions/rewrite-rules-functions.xqy';
import module namespace config = 'http://lds.org/code/content-locator' at '/shared/content-locator/functions/config.xqy';

declare namespace zip = "xdmp:zip";
declare namespace http = "xdmp:http";
declare namespace ldse = "http://lds.org/code/lds-edit";

(: Note that order does not matter, so results are arbitarily ordered to provide consistency :)
declare %test:case function getDiff(){
  let $newRules as element(rule)+ := (
      <rule params="0" path="/callings/missionary/dress-and-grooming/sisters">renderers/photo/service-gallery.xqy?url=/callings/missionary/dress-and-grooming/sisters</rule>,
      <rule params="0" path="/children/resources/topics/love-another">renderers/article/basic-article-narrow.xqy?url=/children/resources/topics/love-another</rule>,
      <rule params="0" path="/children/resources/topics/love-another">renderers/article/basic-article-narrow.xqy?url=/children/resources/topics/love-another</rule>,
      <rule params="0" path="/children/resources/topics/love-one-another">renderers/article/basic-article-narrow.xqy?url=/children/resources/topics/love-one-another</rule>,
      <rule params="0" path="/children/resources/topics/food-and-clothing">renderers/article/basic-article-narrow.xqy?url=/children/resources/topics/food-and-clothing</rule>,
      <rule params="0" path="/callings/meetinghouse-care/testimony-of-holy-things">renderers/video/brightcove-detail.xqy?url=/callings/meetinghouse-care/testimony-of-holy-things</rule>,
      <rule params="0" path="/broadcasts/player-features">renderers/article/basic-article-narrow.xqy?url=/broadcasts/player-features</rule>,
      <rule params="0" path="/broadcasts/how-to-watch">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch-2</rule>,
      <rule params="0" path="/broadcasts/how-to-watch">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch-2</rule>,
      <rule params="0" path="/conflict-partb">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch-issue</rule>)
    
  let $oldRules as element(rule)+ := (
      <rule params="0" path="/callings/missionary/dress-and-grooming/sisters">renderers/photo/service-gallery.xqy?url=/callings/missionary/dress-and-grooming/sisters</rule>,
      <rule params="0" path="/callings/meetinghouse-care/testimony-of-holy-things">renderers/video/brightcove-detail.xqy?url=/callings/meetinghouse-care/testimony-of-holy-things-test</rule>,
      <rule params="0" path="/broadcasts/player-features">renderers/article/basic-article-narrow.xqy?url=/broadcasts/player-features</rule>,
      <rule params="0" path="/broadcasts">renderers/landing/service.xqy?url=/broadcasts</rule>,
      <rule params="0" path="/broadcasts/how-to-watch">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch</rule>,
      <rule params="0" path="/broadcasts/how-to-watch">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch</rule>,
      <rule params="0" path="/conflict-partb">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch</rule>)
    
  let $expected1 := (
      <rule params="0" path="/children/resources/topics/love-another">renderers/article/basic-article-narrow.xqy?url=/children/resources/topics/love-another</rule>,
      <rule params="0" path="/children/resources/topics/love-one-another">renderers/article/basic-article-narrow.xqy?url=/children/resources/topics/love-one-another</rule>,
      <conflict params="0" path="/callings/meetinghouse-care/testimony-of-holy-things">renderers/video/brightcove-detail.xqy?url=/callings/meetinghouse-care/testimony-of-holy-things</conflict>,
      <rule params="0" path="/children/resources/topics/food-and-clothing">renderers/article/basic-article-narrow.xqy?url=/children/resources/topics/food-and-clothing</rule>,
      <conflict params="0" path="/broadcasts/how-to-watch">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch-2</conflict>,
      <conflict params="0" path="/conflict-partb">renderers/article/basic-article-narrow.xqy?url=/broadcasts/how-to-watch-issue</conflict>)

  let $actual1 := rw:getFiltered($newRules, $oldRules)

  (: Sorting intentional - for consistancy (order doesn't matter) :)
  let $test1 := assert:equal(for $rule in $actual1 order by $rule/@path return $rule, for $rule in $expected1 order by $rule/@path return $rule)
  return ($test1)
};
