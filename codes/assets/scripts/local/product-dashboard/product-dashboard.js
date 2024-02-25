$(document).ready(function () {
	let currentCategory = "all";

	//* Get categories
	$.get("/ProductsDashboard/get_categories", function (data) {
		$("#categories-container").html(data);
	});

	//* Get products
	function getProducts() {
		$.get(
			"/ProductsDashboard/product_table/" + currentCategory + "/1",
			function (data) {
				$("#products-container").html(data);
			}
		);
	}

	//* Pagination
	$(document).on("click", ".page_number", function (e) {
		e.preventDefault();
		$.get(
			"/ProductsDashboard/product_table/" +
				currentCategory +
				"/" +
				$(this).data("page"),
			function (data) {
				$("#products-container").html(data);
			}
		);
	});

	getProducts();

	//* Change category
	$("#categories-container").on("click", ".card-categories", function () {
		currentCategory = $(this).data("category");
		$(".card-categories").removeClass("active");
		$(this).addClass("active");
		getProducts();
	});

	// Add product modal
	$(document).on("click", ".add_product", function (e) {
		e.preventDefault();
		$("#addProductModal").modal("show");
	});

	// Edit product modal
	$(document).on("click", ".edit_product", function (e) {
		e.preventDefault();
		$("#editProductModal").modal("show");
	});

	// Delete product modal
	$(document).on("click", ".delete_product", function (e) {
		e.preventDefault();
		$("#deleteProductModal").modal("show");
	});

	// Handle click event on image thumbnails
	$(document).on("click", ".img-upload", function () {
		var target = $(this).data("target");
		$(target).click();
	});
});
