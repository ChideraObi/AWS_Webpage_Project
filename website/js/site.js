function checkLength10(elem){
	if (elem.value.length > 10){
		elem.value = elem.value.substring(0,10);
	}
}

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
