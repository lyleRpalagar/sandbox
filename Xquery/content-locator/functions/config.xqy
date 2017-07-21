xquery version "1.0-ml";

module namespace config = 'http://lds.org/code/content-locator';

declare namespace ldse = "http://lds.org/code/lds-edit";

(: 
  contentLocatorConfig.xml needs to be created to override some configuration for these files
  <cl name='contentLocatorConfig' lang='eng'>
    <config>
      <q-name></q-name>
      <zip-file-limit></zip-file-limit>
      <http-request></http-request>
    </config>
  </cl>
:)


declare function config:configFile() as element()*{
let $query as element()* := 
  cts:search(/cl, 
     cts:and-query((
        cts:element-attribute-value-query(xs:QName('cl'), xs:QName('name'), 'contentLocatorConfig', 'exact'),
        cts:element-attribute-value-query(xs:QName('cl'), xs:QName('lang'), 'eng', 'exact')
     ))
  )
  let $result := if($query) 
    		   then ($query) 
  			   else(
  			   	 element cl {
  			   	 	attribute name{"contentLocatorConfig"},
  			   	 	attribute lang{"eng"},
  			   	 	element config{
  			   	 		element q-name{'ldse:document'},
  			   	 		element q-name{'html'},
  			   	 		element q-name{'custom-page'},
  			   	 		element zip-file-limit{1000},
                element http-request{'https://test.lds.org/'}
  			   	 	}
  			   	 }
  			   )
  return $result
};

declare function config:limit() as xs:integer*{
  let $query as element()* := config:configFile()
  let $default-limit as xs:integer* := 1000
  let $limit as xs:integer* := ($query/config/zip-file-limit/node(), $default-limit)[1]
  return $limit
};

declare function config:http-request() as xs:string*{
  let $query as element()* := config:configFile()
  let $default-http-request as xs:string* := 'http://localhost:8469/'
  let $http-request as xs:string* := ($query/config/http-request/string(), $default-http-request)[1]
  return $http-request
};

declare function config:qname() as xs:QName*{
  let $query as element()* := config:configFile()
  let $default-qname as xs:QName* := (xs:QName('ldse:document'), xs:QName('html'), xs:QName('custom-page'), xs:QName("collection"))
  let $qname as xs:QName* := if($query/config/q-name/node()) then ($query/config/q-name/node()) else($default-qname)
  return $qname
};

declare function config:settings() as element()*{
let $query as element()? := config:configFile()
let $setting as element()* := 
  element div{
  	attribute class{'settings'},
  	element h5{'Configuration Settings'},
  	element label{'File Size Limit:'},
  	element div{
  		attribute class{'setInput'},
  		config:limit()
  	},
  	element label{'QNames Being Used:'},
  	element div{
  		attribute class{'setInput'},
        for $x in config:qname() return (fn:concat('xs:QName("',$x,'")'), '&nbsp;')
  	},
  	element label{'Grabbing Content From:'},
  	element div{
  		attribute class{'setInput'},
  		config:http-request()
  	}
  }
return $setting
};
