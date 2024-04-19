
window.onscroll = function() {
	fixElement();
};

var t = document.getElementById("top");
var f = document.getElementById("footer");
var tTop = t.offsetTop;
 
function fixElement() {
	if (window.pageYOffset >= tTop) {
		t.classList.add("fixd");
	} 
	else {
		t.classList.remove("fixd");
	}
}

 