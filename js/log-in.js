/// <reference path="../typings/jquery/jquery.d.ts"/>

$(document).ready(function() {
	setTimeout(function() {
		$("nav").removeClass("active");
	}, 1500);
	
	$("form").submit(function(event) {
		event.preventDefault();
		var inputs = $(this).find("input");
		inputs.removeClass("invalid");
		var username = inputs.eq(0).val();
		var password = inputs.eq(1).val();
		if (username && password) {
			$.post("../utilities/log-in.php", {
				username: username,
				password: password
			}, function(response) {
				response = JSON.parse(response);
				if (response.error) {
					inputs.not("[type='submit']").addClass("invalid");
				}
				else {
					window.location = "classes.php";
				}
			});
		}
	});
	
});
