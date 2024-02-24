$(document).ready(function () {
	//* Get search value if exists
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const searchValue = urlParams.get("value");

	var currentCategoryID = 0;

	if (searchValue) {
		//* Get Products based on search value
		$.get("/product/search/" + searchValue, function (data) {
			$("#products-container").html(data);
			window.replaceState("", "", "/products");
		});
		
	} else {
		//* Get Products initially on page load
		$.get("/products/0/1", function (data) {
			$("#products-container").html(data);
		});
	}

	//* Get Categories initially on page load
	$.get("/productspage/index_categories", function (data) {
		$("#categories-container").html(data);
	});

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
		window.scrollTo(0, 0);
	});
});
