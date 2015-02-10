function Computer(brand, processor, manufactorDate, memory, software ) {
// Grab the variables from the input and put it into the variable you make.
  this.brand = brand; 
  this.processor = processor;
  this.manufactorDate = manufactorDate;
  this.memory = memory;
  this.software = software;
}

// This function will be use to verify if there was null inputs
/* Make sure you are looking to see if the variables HAVE NOT existed. 
   If you do not you will get errors from both condition
*/
function verify(){
	if(!this.brand || !this.processor || !this.manufactorDate || !this.memory 
		|| !this.software){
		return 'error';
	}else{
		return 'your perfect';
	}
}

Computer.prototype.verify = verify;
// if you dont add prototype you will get this error
/* TypeError: Object #<Computer> has no method 'verify'
    at Object.<anonymous> (/Users/admin/js-sandbox/src/lyle/object.js:32:18)
    at Module._compile (module.js:456:26)
    at Object.Module._extensions..js (module.js:474:10)
    at Module.load (module.js:356:32)
    at Function.Module._load (module.js:312:12)
    at Function.Module.runMain (module.js:497:10)
    at startup (node.js:119:16)
    at node.js:929:3 
 */

// Creates the object and insert data
var mac = new Computer('Mac', '2.2 Ghz Intel Core i7', '2011/1/1', '8gb', 'OS X');
console.log(mac.verify());


var wind = new Computer('Window', 'Intel Celeron N2840 2.16', '2009/1/2', '8gb', 'Window 8');
console.log(wind.verify());

console.log('------------------------------------------------------');

// ** If there was a null in the program
var mac2 = new Computer( null, '2.2 Ghz Intel Core i7', '2011/1/1', '8gb', 'OS X');
console.log(mac2.verify());


var wind2 = new Computer('Window', null, '2009/1/2', '8gb', 'Window 8');
console.log(wind2.verify());

console.log(verify());


