/* ====NOTE 
==============================================================================================================

// Undestand Caesar Cipher which is what this whole program is about.
http://en.wikipedia.org/wiki/Caesar_cipher

// Understand how to put each letter of a string into an array
http://stackoverflow.com/questions/4051385/javascript-access-string-chars-as-array

//Understand array methods (such as splice,push,pop)
http://www.w3schools.com/js/js_array_methods.asp

//Understand how to put a alpha into unicode 
http://www.w3schools.com/jsref/jsref_charcodeat.asp

//how to put a unicode into alpha
http://stackoverflow.com/questions/2171698/how-do-i-get-the-numeric-representation-of-a-character-in-javascript

*/


function ccipher(key, shift, direction, word){
  var k = key.toUpperCase();
  var s = shift;
  var dir = direction;
console.log(k + ' ' + s + ' ' + dir);
console.log( '----------------------' );

// Orignal Alpha been put into an array.
 var alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M',
              'N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
// Shifts the placement of the orginal alpha 
     for(i=0; i < shift; i++){
         var hold = alpha[25];
            alpha.pop(alpha[25]);
            alpha.unshift(hold);
       console.log(alpha);
      }

/* Another way of writing it is:
	
	var myAlpha= 'abcdefghijklmnopqrstuvwxyz'.toUpperCase();
	var alphabetic = myAlpha.split("");

		for(i=0; i < shift; i++){
        	 var hold = alphabetic[25];
            	alphabetic.pop(alphabetic[25]);
            	alphabetic.unshift(hold);
                console.log(alphabetic);
		}

*/

// Grabs the users word and splits the letter of the words and puts them in the array.
	var myString = word.toUpperCase();
	var strChars = myString.split("");
console.log(strChars);


}


// Testing <
var word = "Hello";
var key = 'A';
var shift = 3;
// false = right , true = left
var direction = true;


// > /Testing
ccipher(key, shift, direction, word);



