// Hide header on scroll down
$(window).scroll(function () {
	if ($(this).scrollTop() > 1) {
		$("#header").addClass("d-none");
		$("#search-bar-brand").addClass("d-sm-block");
		$("#search-bar").addClass("pt-3");
	} else {
		$("#header").removeClass("d-none");
		$("#search-bar-brand").removeClass("d-sm-block");
		$("#search-bar").removeClass("pt-3");
	}
});
