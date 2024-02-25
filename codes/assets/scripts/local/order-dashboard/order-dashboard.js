$(document).ready(function () {
	let currentStatus = "all";

	function update_table() {
		$.get("/OrdersDashboard/order_table/" + currentStatus, function (data) {
			$("#order-table-container").html(data);
		});
	}

	update_table();

	$("#search_text").attr("placeholder", "Search Receiver Name");
	$("#search_button").val("Search");
	$(document).on("keyup", "#search_text", function (e) {
		e.preventDefault();
		$.get(
			"/OrdersDashboard/order_table/" + "all" + "/1/" + $(this).val(),
			function (data) {
				$("#order-table-container").html(data);
			}
		);
	});

	$(document).on("click", ".status", function (e) {
		e.preventDefault();
		//* Update Status

		$.get($(this).attr("href"), function (data) {
			update_table();
		});
	});

	//* Change Status
	$(document).on("click", ".card-categories", function (e) {
		e.preventDefault();
		currentStatus = $(this).data("status");
		$(".card-categories").removeClass("active");
		$(this).addClass("active");
		update_table();
	});
	//* Pagination
	$(document).on("click", ".page_number", function (e) {
		e.preventDefault();

		$.get(
			"/OrdersDashboard/order_table/" +
				currentStatus +
				"/" +
				$(this).data("page"),
			function (data) {
				$("#order-table-container").html(data);
			}
		);
	});
});
