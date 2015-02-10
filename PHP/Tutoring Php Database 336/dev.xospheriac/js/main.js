function edit(){
	document.getElementById('modifyInfo').setAttribute("class", "show");
    document.getElementById('userInfo').setAttribute("class", "hidden");
}
function getHeight(){
	var usersHeight = screen.height;
	var uHeight = usersHeight - 257;
			document.getElementById('container').style.minHeight=uHeight+54+"px";
}