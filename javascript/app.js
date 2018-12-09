$(function() {
	var modal = $("#add_goal_modal");
	var btn = $("#new_goal_button");
	var close = $(".close");
	
	btn.on('click', function() {
		modal.css('display', 'block');
	});
	
	close.on('click', function() {
		modal.css('display', 'none');
	});
});

function validate() {
	var isValid = true;
	var start = $("input[name='start_date']");
	var end = $("input[name='end_date']");
	var startDate = start.val();
	var endDate = end.val();
	var startDateComponents = startDate.split("-");
	var endDateComponents = endDate.split("-");
	var startDateDays = startDateComponents[0] * 365 + startDateComponents[1] * 30 + startDateComponents[2];
	var endDateDays = endDateComponents[0] * 365 + endDateComponents[1] * 30 + endDateComponents[2];
	
	if (startDate.length === 0) {
		isValid = false;
		alert("Please enter start date");
	}
	if (endDate.length === 0) {
		isValid = false;
		alert("Please enter end date");
	}
	if (endDateDays < startDateDays) {
		isValid = false;
		alert("Please ensure the end date is later than the start date");
	}
	
	return isValid;
}