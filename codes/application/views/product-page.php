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
    <!-- Load Product Page Scripts -->
    <script src=<?= base_url("assets/scripts/local/product-page/product-page.js") ?> ></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/local/product-page.css")?>">
</head>
<body>
    <!-- Load User Header --> 
    <?php $this->load->view('partials/user-header'); ?>
        <div class="container">
            <div class="row">
                <div class="container mt-3 col-12 col-md-3">
                    <div class="row">
                        <div class="col-12">
                            <h2>Categories</h2>
                        </div>
                    </div>
                    <div
                        class="row row-cols-auto gap-5 flex-nowrap flex-md-wrap overflow-auto align-items-center justify-content-start p-4"
                        id="categories-container">
                        <!-- Categories -->
                    </div>
                </div>
                <div class="container mt-3 col-12 col-md-9">
                    <div class="row">
                        <div class="col-12">
                            <h2>Products</h2>
                        </div>
                    </div>
                    <div class="row p-4 gy-3 gy-sm-3 gy-md-5 justify-content-start" id="products-container">
                    <!-- Products and Pagination -->
                    </div>
                </div>
            </div>
        </div>
</body>
</html>