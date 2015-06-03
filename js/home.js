/// <reference path="../typings/jquery/jquery.d.ts"/>

$(document).ready(function() {
	setTimeout(function() {
		$("nav").removeClass("active");
		$("section#bars div").each(function() {
			var size = Math.floor(Math.random() * 20) + 30;
			$(this).css({
				"width": size + "em",
				"height": size + "em"
			});
		});
	}, 1500);
});
