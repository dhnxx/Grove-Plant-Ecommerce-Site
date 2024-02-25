<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Load Global Scripts (CDN/BS) --> 
    <?php $this->load->view('partials/global-scripts'); ?>
    <!-- Load Global Scripts (Header) -->
    <script src=<?= base_url("assets/scripts/global/script.js") ?> ></script>
    <!-- Load Specific Product Scripts -->
    <script src=<?= base_url("assets/scripts/local/specific-product/specific-product.js") ?> ></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/local/product-page.css")?>">
</head>
<body>
    <!-- Load User Header --> 
    <header class="navbar-dark main-color sticky-top" id="header-container">
        <?php $this->load->view('partials/user-header'); ?>
    </header>
    <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("products") ?>">Home Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Name</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-auto col-md-12 specific-item-container">
                    <div class="row main-image-container">
                        <img
                            src="https://placehold.co/250x250"
                            alt="Product Image"
                            class="main-image"
                        />
                    </div>
                    <div class="d-flex justify-content-around gap-4 mt-3">
                        <img
                            class="card mx-auto d-block card-active"
                            src="https://placehold.co/100x100"
                            alt="Product Image"
                        />
                        <img
                            class="card mx-auto"
                            src="https://placehold.co/100x100"
                            alt="Product Image"
                        />
                        <img
                            class="card mx-auto"
                            src="https://placehold.co/100x100"
                            alt="Product Image"
                        />
                        <img
                            class="card mx-auto"
                            src="https://placehold.co/100x100"
                            alt="Product Image"
                        />
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-6 col-lg-5 col-md-12 specific-item-container mt-3">
                    <div class="row">
                        <h1><?= $product['name'] ?></h1>
                        <div class="d-inline-block">
<?php for ($i = 0; $i < $product['avg_rating']; $i++) { ?>
                            <span class="fa fa-star checked"></span>
<?php } ?>
<?php for ($i = $product['avg_rating']; $i < 5; $i++) { ?>
                            <span class="fa fa-star "></span>
<?php } ?>
                        </div>
                        <p class="d-inline-block"><?= $product['review_count'] ?> rating/s</p>
                        <h3>Price: $<?= $product['price'] ?></h3>
                        <p>Stocks: <?= $product['stocks'] ?></p>
                        <p class="description overflow-auto">
                            <?= $product['description'] ?>
                        </p>
                    </div>

                    <form action="<?= base_url("carts/add_to_cart") ?>" method="post" class="row" id="add-to-cart" >
                        <div class="col-4">
                            <div class="row">
                                <p>Quantity</p>
                            </div>
                            <div class="row">
                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-primary" type="button" id="decrement">-</button>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <input
                                        type="text"
                                        class="form-control text-center"
                                        aria-describedby="basic-addon1"
                                        value="1"
                                        name="quantity"
                                        id="quantity"
                                    />
                                    <input type="hidden" id="price"name="price-val" value="<?= $product['price'] ?>">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button class="btn btn-outline-primary" type="button" id="increment">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <p>Total</p>
                            </div>
                            <div class="row">
                                <p id="total-price"></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <p>Shipping</p>
                            </div>
                            <div class="row">
                                <button class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <h2>Similar Items</h2>
                </div>
            </div>
            <div class="row g-5 gy-3">
<?php foreach ($similar_products as $product) { ?>
                <a href="<?= base_url("product/view/" . $product["id"]) ?>" class="col-6 col-md-4 col-lg-3 text-decoration-none text-dark">
                    <div class="card card-products hover-effect">
                        <img
                            src="https://www.flowerpower.com.au/wordpress/wp-content/uploads/2023/01/fibreclay-ashton-pots.jpg"
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title"><?= $product["name"] ?></h5>
                            </div>
                            <div class="row">
                                <p>$<?= $product["price"] ?></p>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <div class="d-inline-block">
<?php for ($i = 0; $i < $product['avg_rating']; $i++) { ?>
                            <span class="fa fa-star checked"></span>
<?php } ?>
<?php for ($i = $product['avg_rating']; $i < 5; $i++) { ?>
                            <span class="fa fa-star "></span>
<?php } ?>
                                    </div>
                                </div>
                                <div class="col-auto ms-0 ms-xl-auto">
                                    <p><?= !$product['review_count'] ? "No Reviews yet": $product['review_count'] . " review/s" ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
<?php } ?>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <h2>Reviews</h2>
                </div>
            </div>
            <div class="row g-0 gy-3 mb-5">
<?php if (empty($reviews)) { ?>
                <div class="col-12">
                    <p>No reviews yet</p>
                </div>
<?php } ?>
<?php foreach ($reviews as $review) { ?>
                <div class="col-12 card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="d-inline-block me-3"><?= $review['name'] ?></h4>
                            <p class="d-inline-block m-0">February 19, 2024</p>
                        </div>
                        <div class="d-inline-block">
<?php for ($i = 0; $i < $review['rating']; $i++) { ?>
                            <span class="fa fa-star checked"></span>
<?php } ?>
<?php for ($i = $review['rating']; $i < 5; $i++) { ?>
                            <span class="fa fa-star "></span>
<?php } ?>
                        </div>
                    </div>
                    <p class="card-body">
<?= $review['review'] ?>
                    </p>
                </div>
<?php } ?>
            </div>
        </div>
        <!-- Add to cart toast -->
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="add-to-cart-toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Added to Cart</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Product has been added to cart
                </div>
            </div>
        </div>    
</body>