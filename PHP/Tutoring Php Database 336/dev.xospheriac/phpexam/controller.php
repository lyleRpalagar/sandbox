<?php
// Functions
// ----------------------------------------

// Main Page View
function main($action){
     switch($action){
               case 'Home':
              // do something
               $info = ['World Travel Site', 'This site is dedicated to places to visit in a variety of countries around the world.'];
            return $info;
               break;
               case 'Africa':
                 // do something
               $info = ['Africa', 'Africa is the largest continent in the Southern Hemisphere.'];
               return $info;
               break;
               
               case 'Antarctica':
                 // do something
               $info = ['Antarctica', 'Africa is the coldest and least populated continent.'];
               return $info;
               break;
               case 'Asia':
                 // do something
               $info = ['Asia', 'Asia is the most densely populated continent.'];
               return $info;
               break;
               case 'Europe':
                 // do something
               $info = ['Europe', 'Europe is the most industrialized continent in the world.'];
               return $info;
               break;
               case 'North America':
                 // do something
               $info = ['North America', 'North America has the largest natrual gas and coal reserves on the planet.'];
               return $info;
               break;
               case 'Oceania':
                 // do something
               $info = ['Oceania', 'Oceania is the most dispersed continent consisting of hundreds of island spread across millions of square kilometers.'];
               return $info;
               break;
               case 'South America':
                 // do something
               $info = ['South America', 'South America is rich in culture and languages from both the old and new worlds.'];
               return $info;
               break;
                    default: header("location: ?action=Home");
     }
}

// END
// ----------------------------------------
?>