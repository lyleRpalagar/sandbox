# Content-Locator

Query content from server lane, zip up the content related to the URL provided, and upload the content to a local database.
NOTICE THIS WONT WORK WITHOUT POM.XML and packages using lds.org private internal artifacts
Objectives: 
       
 * Reduce developer content downloading time. 
       
 * Zip content and upload content to local database.

#### How To Use
1. Go to projectHost:projectPort/shared/content-locator/
2. To use content-locator, simply paste a full URL of the content you would like to have uploaded to your local database into the form and click on the button `populate`. 
3. The content-locator will send the URL to the endpoint specified in the config, which will return a zipped folder that will be unzipped and uploaded to your local database. 
4. You should see either the list of files that have been uploaded in your database on your screen or an error message.

A note about the relative URI used: If the path after the hostname looked like /topics, the following URI's would be queried:
    * topics
    * topics/
    * /topics
    * /topics/

#### Configuration
There is some functionality you can change with a configuration file:

1. zip-file-limit : Limits the files to download 
2. http-request : Defines the lane you will copy data from
3. q-name : QNames used to query data.

Example of a configuration file


     <cl name='contentLocatorConfig' lang='eng'>
        <config>
            <q-name></q-name>
            <q-name></q-name>
            <zip-file-limit></zip-file-limit>
             <http-request></http-request>
        </config>
     </cl>

#### Demo:

![Content-Locator Demo](https://github.com/lyleRpalagar/sandbox/blob/master/Xquery/content-locator/resources-img-example.gif)

---------------------

Author: Lyle Palagar