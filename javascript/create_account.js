$(function() {
	var username = $("input[name='username']");
	username.on("change", function() {
		if (username.val() === "") {
			var usernameTaken = $("#username");
			if (usernameTaken.hasClass("hidden") === false)
				usernameTaken.addClass("hidden");
			var usernameGood = $(".confirmation");
			if (usernameGood.hasClass("hidden") === false)
				usernameGood.addClass("hidden");
			return;
		}
		var usernameObject = new Object();
		usernameObject.username = username.val();
		$.ajax({
			type: "GET",
			data: usernameObject,
			url: "/ScriptureTracker/json/username_exists.php",
			success: function(result)
			{
				console.log(result);
				var usernameTaken = $("#username");
				if (usernameTaken.hasClass("hidden") === false)
					usernameTaken.addClass("hidden");
				var usernameGood = $(".confirmation");
				if (usernameGood.hasClass("hidden") === false)
					usernameGood.addClass("hidden");
				if (result === true) 
					usernameTaken.removeClass("hidden");
				else
					usernameGood.removeClass("hidden");
			}
		});
	});
});

function validate() {
	var isValid = true;
	var firstName = $("input[name='firstname']");
	var firstNameError = $('#firstname');
	if (firstNameError.hasClass("hidden") === false) {
		firstNameError.addClass("hidden");
	}
	if (firstName.val().length === 0){
		firstNameError.removeClass("hidden");
		isValid = false;
	}
	var lastName = $("input[name='lastname']");
	var lastNameError = $('#lastname');
	if (lastNameError.hasClass("hidden") === false) {
		lastNameError.addClass("hidden");
	}
	if (lastName.val().length === 0){
		lastNameError.removeClass("hidden");
		isValid = false;
	}
	var email = $("input[name='email']");
	var emailError = $('#email');
	if (emailError.hasClass("hidden") === false) {
		emailError.addClass("hidden");
	}
	var validEmail = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
	if (email.val().length === 0){
		emailError.removeClass("hidden");
		isValid = false;
	} else if (validEmail.test(email.val()) === false) {
		emailError.removeClass("hidden");
		isValid = false;
	}
	var password = $("input[name='password']");
	var passwordError = $('#password');
	if (passwordError.hasClass("hidden") === false) {
		passwordError.addClass("hidden");
	}
	if (password.val().length === 0){
		passwordError.removeClass("hidden");
		isValid = false;
	}
	var confirmPassword = $("input[name='confirm_password']");
	var confirmPasswordError = $('#confirm_password');
	if (confirmPasswordError.hasClass("hidden") === false) {
		confirmPasswordError.addClass("hidden");
	}
	if (confirmPassword.val().length === 0){
		confirmPasswordError.removeClass("hidden");
		isValid = false;
	} else if (confirmPassword.val() !== password.val()) {
		confirmPasswordError.removeClass("hidden");
		isValid = false;
	}
	
	return isValid;
}