$(document).ready(function () {
	//* Get Categories initially on page load
	$.get("/productspage/index_categories", function (data) {
		$("#categories-container").html(data);
	});

	//* Get Products initially on page load
	$.get("/products/0/1", function (data) {
		$("#products-container").html(data);
	});

	var currentCategoryID = 0;

	//* Get Products on category click
	$(document).on("click", ".card-categories", function () {
		currentCategoryID = $(this).attr("category_id");
		$.get("/products/" + currentCategoryID + "/1", function (data) {
			$("#products-container").html(data);
		});
	});

	//* Pagination
	$(document).on("click", ".page-link", function (e) {
		e.preventDefault();
		$.get(
			"/products/" + currentCategoryID + "/" + $(this).attr("href"),
			function (data) {
				$("#products-container").html(data);
			}
		);
	});
});
