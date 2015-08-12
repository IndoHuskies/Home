(function() {

window.onload = function() {

	$("event-tab").onclick = changeIcon;

};

function changeIcon() {
	if($("event-tab-icon").getAttribute("src") == "img/plus.png") {
		$("event-tab-icon").src = "img/min.png";
	} else {
		$("event-tab-icon").src = "img/plus.png";
	}
}

function $(id) {
	return document.getElementById(id);
}

}());