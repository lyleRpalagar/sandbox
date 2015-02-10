// intialize request
var req = new XMLHttpRequest();

// specify two request ( METHOD, URL)
req.open('GET', 'http://cit261-api.herokuapp.com/api');

// set up headers. ( 'Accept / ?' , header type)
// want the api to be specific on what type you want back
req.setRequestHeader('Accept', 'application/json');
// when the request gets back the functin will load.
// when the request changes it fires the AJAX handle
//req.onreadystatechange

// log req to view what you are calling
req.onload = function(){
	console.log(req.status);
	console.log(req.response);
}
// send req
req.send()
