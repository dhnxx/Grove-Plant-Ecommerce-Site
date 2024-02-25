$(document).ready(function () {
	let priceVal = parseFloat($("#price").val());

	//* Define quantity outside the event handlers
	let quantity = parseInt($("#quantity").val());
	let totalPrice = priceVal * quantity;
	$("#total-price").text(totalPrice.toFixed(2));

	function updateTotalPrice() {
		$("#total-price").text(totalPrice.toFixed(2));
	}

	$(document).on("click", "#decrement", function () {
		if (quantity > 1) {
			quantity--;
			totalPrice = priceVal * quantity;
			$("#quantity").val(quantity);
			updateTotalPrice();
		}
	});

	$(document).on("click", "#increment", function () {
		quantity++;
		totalPrice = priceVal * quantity;
		$("#quantity").val(quantity);
		updateTotalPrice();
	});

	$(document).on("submit", "#add-to-cart", function (e) {
		e.preventDefault();
		e.stopPropagation();
		$.post($(this).attr("action"), $(this).serialize(), function () {
			//! Show bootstrap toast notification
			
			//* Refresh header
			$.get("/carts/refresh_header", function (data) {
				$("#header-container").html(data);
			});
		});
	});

});
