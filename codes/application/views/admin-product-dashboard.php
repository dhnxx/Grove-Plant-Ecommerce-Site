<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order Dashboard</title>
    <!-- Load Global Scripts (CDN/BS) --> 
    <?php $this->load->view('partials/global-scripts'); ?>
    <!-- Load Global Scripts (Header) -->
    <script src=<?= base_url("assets/scripts/global/script.js") ?> ></script>
    <!-- Load Order Dashboard Page Scripts -->
    <script src=<?= base_url("assets/scripts/local/product-dashboard/product-dashboard.js") ?> ></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/local/admin-product-dashboard.css")?>">
</head>
<body>
    <!-- Load User Header --> 
    <header class="navbar-dark main-color sticky-top" id="header-container">
    <?php $this->load->view('partials/admin-header'); ?>
    </header>
    <div class="container mt-3">
			<div class="row">
				<div class="container col-12 col-md-3">
					<div class="row">
						<div class="col-12">
							<h2>Categories</h2>
						</div>
					</div>
					<div
						class="row row-cols-auto gap-5 flex-nowrap flex-md-wrap overflow-auto align-items-center justify-content-xxl-start justify-content-center p-4"
						id="categories-container">
						
					</div>
				</div>

				<div class="container col-12 col-md-9" id="products-container">			
				</div>

				<!--Add Product Modal-->
				<div
					class="modal fade"
					id="addProductModal"
					tabindex="-1"
					aria-labelledby="addProductModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
								<button
									type="button"
									class="btn-close"
									data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form>
									<div class="mb-3">
										<label for="product_name" class="form-label"
											>Product Name</label
										>
										<input
											type="text"
											class="form-control"
											id="productName"
											aria-describedby="productName" />
									</div>
									<div class="mb-3">
										<label for="product_description" class="form-label"
											>Product Description</label
										>
										<textarea
											class="form-control"
											id="productPrice"
											aria-describedby="productPrice"
											rows="3"></textarea>
									</div>
									<div class="mb-3 d-flex justify-content-between">
										<label for="productCategory" class="form-label"
											>Category</label
										>
										<div class="btn-group">
											<button type="button" class="btn btn-outline-secondary">
												Categories
											</button>
											<button
												type="button"
												class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
												data-bs-toggle="dropdown"
												aria-expanded="false">
												<span class="visually-hidden">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu">
												<li>
													<a class="dropdown-item" href="#">Action</a>
												</li>
												<li>
													<a class="dropdown-item" href="#"
														>Separated link</a
													>
												</li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="mb-3 col-6">
											<label for="product_stock" class="form-label"
												>Stock</label
											>
											<input
												type="text"
												class="form-control"
												id="productStock"
												aria-describedby="productStock" />
										</div>
										<div class="mb-3 col-6">
											<label for="product_price" class="form-label"
												>Price</label
											>
											<input
												type="text"
												class="form-control"
												id="productSold"
												aria-describedby="productSold" />
										</div>
									</div>

									<div class="mb-3">
										<label for="productImage" class="form-label"
											>Upload Image/s &lpar;4 max&rpar;</label
										>
										<!-- Clickable Images -->
										<div class="row">
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage1" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage1" />
											</div>
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage2" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage2" />
											</div>
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage3" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage3" />
											</div>
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage4" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage4" />
											</div>
										</div>
									</div>
									<div class="mb-3 d-grid">
										<button type="submit" class="btn btn-primary">
											Add Product
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<!--Edit Product Modal-->
				<div
					class="modal fade"
					id="editProductModal"
					tabindex="-1"
					aria-labelledby="addProductModalLabel"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
								<button
									type="button"
									class="btn-close"
									data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form>
									<div class="mb-3">
										<label for="product_name" class="form-label"
											>Product Name</label
										>
										<input
											type="text"
											class="form-control"
											id="productName"
											aria-describedby="productName" />
									</div>
									<div class="mb-3">
										<label for="product_description" class="form-label"
											>Product Description</label
										>
										<textarea
											class="form-control"
											id="productPrice"
											aria-describedby="productPrice"
											rows="3"></textarea>
									</div>
									<div class="mb-3 d-flex justify-content-between">
										<label for="productCategory" class="form-label"
											>Category</label
										>
										<div class="btn-group">
											<button type="button" class="btn btn-outline-secondary">
												Categories
											</button>
											<button
												type="button"
												class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
												data-bs-toggle="dropdown"
												aria-expanded="false">
												<span class="visually-hidden">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu">
												<li>
													<a class="dropdown-item" href="#">Action</a>
												</li>
												<li>
													<a class="dropdown-item" href="#"
														>Separated link</a
													>
												</li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="mb-3 col-6">
											<label for="product_stock" class="form-label"
												>Stock</label
											>
											<input
												type="text"
												class="form-control"
												id="productStock"
												aria-describedby="productStock" />
										</div>
										<div class="mb-3 col-6">
											<label for="product_price" class="form-label"
												>Price</label
											>
											<input
												type="text"
												class="form-control"
												id="productSold"
												aria-describedby="productSold" />
										</div>
									</div>

									<div class="mb-3">
										<label for="productImage" class="form-label"
											>Upload Image/s &lpar;4 max&rpar;</label
										>
										<!-- Clickable Images -->
										<div class="row">
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage1" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage1" />
											</div>
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage2" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage2" />
											</div>
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage3" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage3" />
											</div>
											<div class="col-3">
												<img
													src="../pages/assets/images/leaf.png"
													class="img-thumbnail img-upload"
													alt="..."
													data-target="#productImage4" />
												<input
													type="file"
													class="file-upload d-none"
													id="productImage4" />
											</div>
										</div>
									</div>
									<div class="mb-3 d-grid">
										<button type="submit" class="btn btn-primary">
											Edit Product
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Delete Modal-->
		<div
			class="modal fade"
			id="deleteProductModal"
			tabindex="-1"
			aria-labelledby="deleteProductModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
						<button
							type="button"
							class="btn-close"
							data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete this product?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="button" class="btn btn-danger">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</body>