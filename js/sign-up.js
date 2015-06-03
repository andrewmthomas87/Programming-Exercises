/// <reference path="../typings/jquery/jquery.d.ts"/>

$(document).ready(function() {
	setTimeout(function() {
		$("nav").removeClass("active");
	}, 1500);

	$("form").submit(function(event) {
		event.preventDefault();
		var inputs = $(this).find("input");
		var firstName = inputs.eq(0).val();
		var lastName = inputs.eq(1).val();
		var username = inputs.eq(2).val();
		var password = inputs.eq(3).val();
		inputs.removeClass("invalid");
		var invalid;
		invalid = !(firstName && /^[a-z]+$/i.test(firstName));
		if (invalid) {
			inputs.eq(0).addClass("invalid");
		}
		invalid = !(lastName && /^[a-z]+$/i.test(lastName));
		if (invalid) {
			inputs.eq(1).addClass("invalid");
		}
		invalid = !(username && /^\w+$/.test(username));
		if (invalid) {
			inputs.eq(2).addClass("invalid");
		}
		invalid = !(password && /^\w+$/.test(password));
		if (invalid) {
			inputs.eq(3).addClass("invalid");
		}
		if (!inputs.hasClass("invalid")) {
			$.post("../utilities/sign-up.php", {
				firstName: firstName,
				lastName: lastName,
				username: username,
				password: password
			}, function(response) {
				response = JSON.parse(response);
				if (response.error) {
					var inputs = $("input");
					if (response.firstName) {
						inputs.eq(0).addClass("invalid");
					}
					if (response.lastName) {
						inputs.eq(1).addClass("invalid");
					}
					if (response.username) {
						inputs.eq(2).addClass("invalid");
					}
					if (response.password) {
						inputs.eq(3).addClass("invalid");
					}
				}
				else {
					window.location = "log-in.php";
				}
			});
		}
	});

});
