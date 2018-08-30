window.onscroll = function() {myFunction()};

function myFunction() {
	var brandName = document.getElementById("brandName");
	var sticky = brandName.offsetTop;
  	if(sticky>0){
  		brandName.style.color = "transparent";
	}
}