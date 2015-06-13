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
					alert(response.id);
					$("section#sidebar").append("<a class=\"class-name\" class-id=\"" + response.id + "\">" + response.name + "</a><a class=\"delete\">Delete</a>\n");
					inputs.eq(0).val("");
					inputs.eq(1).val("");
					$("section#sidebar").find("span").show("fast");
					$("form#newClass").hide("fast", function() {
						$("div#overlay").hide("fast");
					});
				}
			});
		}
	});
	
	$("section#sidebar").on("click", "a.delete", function() {
		var id = $(this).prev().attr("class-id");
		$.post("../utilities/remove-class.php", {
			id: id
		}, function(response) {
			response = JSON.parse(response);
			if (!response.error) {
				$("section#sidebar a[class-id=\"" + id + "\"].class-name").remove();
				$("section#sidebar a[class-id=\"" + id + "\"].delete").remove();
			}
		});
	});
	
});
