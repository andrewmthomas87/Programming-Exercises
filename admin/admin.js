/// <reference path="../typings/jquery/jquery.d.ts"/>

$(document).ready(function() {

	$("section#sidebar").find("span").click(function() {
		$(this).hide("fast");
		$("div#overlay").show("fast", function() {
			$("form#newClass").show("fast");
		});
	});
	
	$("form").submit(function(event) {
		event.preventDefault();
		var inputs = $(this).find("input");
		var name = inputs.eq(0).val();
		var description = inputs.eq(1).val();
		if (name && description) {
			$.post("../utilities/add-class.php", {
				name: name,
				description: description
			}, function(response) {
				response = JSON.parse(response);
				if (!response.error) {
					$("section#sidebar").append("<a>" + response.name + "</a>");
					inputs.eq(0).val("");
					inputs.eq(1).val("");
					$("form#newClass").hide("fast", function() {
						$("section#sidebar, div#overlay").hide("fast");
					});
				}
			});
		}
	});
	
});
