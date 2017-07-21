function $(anID){
	return document.querySelector(anID);
}
var stmt = "close";

$('#cog-toggle').addEventListener( "click", function(){
    this.classList.toggle("active");
    if(stmt == "close"){
		stmt = "open";
		$('#setting-wrapper').setAttribute("class", "expand");
        $('#cog-toggle').style.animation ='5s roll infinite linear';
        $('#cog-toggle').style.transform ='rotate(30deg)';
    }
	else if(stmt == "open"){
		stmt = "close";
		$('#setting-wrapper').setAttribute("class", "");
        $('#cog-toggle').style.animation ='';
        $('#cog-toggle').style.transform ='';
	}
    else{ window.alert('Something is wrong with the Cog Icon toggle functions'); }
});

var toggles = document.querySelectorAll('.toggler');
for (var i = toggles.length - 1; i >= 0; i--){
	toggles[i].addEventListener('click', function(e){
		e.target.classList.toggle('selected');
		e.target.nextElementSibling.classList.toggle('hide');
	});
}

$('#rewrite__checkall').addEventListener('click', function(){
    if(this.checked){console.log('true');}else{console.log('false');}
	for (var boxes = [].slice.apply(document.querySelectorAll(".rewriteRulesWrapper input[type=checkbox]")), i = boxes.length - 1, box = boxes[i]; i >= 0; box = boxes[--i]){
		box.checked = this.checked || false;
	}
});
