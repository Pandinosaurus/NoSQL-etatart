// Tooltips and popovers
(function() {
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();
})();

// Headroom
$("header").headroom();

// Material design
$(document).ready(function() {
	$.material.init();
	$(".navbar").headroom();
});

function pad(num, size) {
	var s = num + "";
	while (s.length < size) s = "0" + s;
	return s;
}

function extractHoursAndMinutesFromTimer(divID, icon) {
	var time = $("#"+divID).val();
	var hours, minutes;
	
	hours = Math.floor(time / 60);
	minutes = Math.floor(time % 60);

	return icon + ' ' + hours + ' h ' + pad(minutes, 2);
}