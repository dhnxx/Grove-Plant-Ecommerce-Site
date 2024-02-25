$(document).ready(function () {
	//* Cart items
	function update_cart() {
		$.get("/carts/index_cart", function (data) {
			$("#cart-container").html(data);
			//* Order Summary
			$("#subtotal").text("Subtotal: $" + $("#order_summary").data("subtotal"));
			$("#shipping").text("Shipping: $" + $("#order_summary").data("shipping"));
			$("#total").text("Total: $" + $("#order_summary").data("total"));
		});
	}
	update_cart();

	//* Remove Item
	$(document).on("submit", ".remove-item-form", function (e) {
		e.preventDefault();
		//! Add bootstrap toasts
		//! Add a delete confirmation
		$.post("/carts/remove_from_cart", $(this).serialize(), function () {
			update_cart();

			//* Refresh header
			$.get("/carts/refresh_header", function (data) {
				$("#header-container").html(data);
			});
		});
	});

	let submitClicked = ""; // Variable to store the button that was clicked

	$(document).on("click", ".quantity-button", function (e) {
		submitClicked = $(this).data("value");
	});

	//* Update Quantity
	$(document).on("submit", ".update-quantity-form", function (e) {
		e.preventDefault();
		let params = $(this).serialize() + "&submit=" + submitClicked;
		$.post("carts/update_quantity", params, function (e) {
			update_cart();
		});
	});

	//* Checkout
	$(document).on("submit", "#checkout-form", function (e) {
		e.preventDefault();
		$.post($(this).attr("action"), $(this).serialize(), function (data) {
			console.log(data);
			let receipt_url = JSON.parse(data);
			console.log(receipt_url);
			$("#checkoutModal").modal("hide");

			update_cart();

			//* Open receipt url in new tab
			window.open(receipt_url);

			//* Redirect to products page
			location.replace("/products");
		});
	});

	//* View Modal
	$(".checkout").click(function () {
		$("#checkoutModal").modal("show");
	});

	//* Same as Billing
	$("#flexSwitchCheckDefault").click(function () {
		if ($(this).is(":checked")) {
			$("#billing-information").addClass("d-none");
		} else {
			$("#billing-information").removeClass("d-none");
		}
	});
});
