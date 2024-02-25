$(document).ready(function () {
	var currentForm = "login";

	//* Load login form
	$.get("/usersauth/index_login", function (data) {
		$("#auth-form").html(data);
		$("#auth-switch").text("Don't have an account? Sign up");
		$("#auth-switch").attr("current", "login");
	});

	//* Switch between login and signup
	$("#auth-switch").click(function (e) {
		e.preventDefault();
		var currentLink = $(this).attr("current");
		if (currentLink == "login") {
			$.get("/usersauth/index_signup", function (data) {
				$("#auth-form").html(data);
				$("#auth-switch").text("Already have an account? Login");
				$("#auth-switch").attr("current", "signup");
				currentForm = "signup";
			});
		} else {
			$.get("/usersauth/index_login", function (data) {
				$("#auth-form").html(data);
				$("#auth-switch").text("Don't have an account? Sign up");
				$("#auth-switch").attr("current", "login");
				currentForm = "login";
			});
		}
	});

	//* Submit form
	$(document).on("submit", "#auth-form form", function (e) {
		e.preventDefault();
		$.post(
			"/usersauth/validate_" + currentForm,
			$(this).serialize(),
			function (data) {
				console.log(data);
				if (!data) {
					$("#auth-form").html(data);
				}

				if (data == "user") {
					//* Redirect to products page if login is successful
					window.location.href = "/products";
				} else if (data == "admin") {
					//* Redirect to admin page if login is successful
					window.location.href = "/admin/dashboard/orders";
				} else {
					$("#auth-form").html(data);
				}
			}
		);
	});
});
