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
})