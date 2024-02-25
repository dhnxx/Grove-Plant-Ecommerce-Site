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
    <script src=<?= base_url("assets/scripts/local/order-dashboard/order-dashboard.js") ?> ></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/local/admin-order-dashboard.css")?>">
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
                        <h2>Status</h2>
                    </div>
                </div>
                <div
                    class="row row-cols-auto gap-5 flex-nowrap flex-md-wrap overflow-auto align-items-center justify-content-start p-4"
                >
                    <button
                        type="button"
                        class="btn btn-secondary position-relative card-categories hover-effect active"
                        id="all-orders"
                        data-status="all"
                    >
                        All Orders
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color"
                        >
                            <?= $status_count["all"]["count"] ?>
                            <span class="visually-hidden">Item Count</span>
                        </span>
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary position-relative card-categories hover-effect"
                        id="pending-orders"
                        data-status="pending"
                    >
                        Pending Orders
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color"
                        >
                            <?= $status_count["pending"]["count"] ?>
                            <span class="visually-hidden">Item Count</span>
                        </span>
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary position-relative card-categories hover-effect"
                        id="on-process-orders"
                        data-status="on-process"
                    >
                        On Process Orders
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color"
                        >
                            <?= $status_count["on-process"]["count"] ?>
                            <span class="visually-hidden">Item Count</span>
                        </span>
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary position-relative card-categories hover-effect"
                        id="shipped-orders"
                        data-status="shipped"
                    >
                        Shipped Orders
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color"
                        >
                            <?= $status_count["shipped"]["count"] ?>
                            <span class="visually-hidden">Item Count</span>
                        </span>
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary position-relative card-categories hover-effect"
                        id="delivered-orders"
                        data-status="delivered"
                    >
                        Delivered Orders
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color"
                        >
                            <?= $status_count["delivered"]["count"] ?>
                            <span class="visually-hidden">Item Count</span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="container col-12 col-md-9" id="order-table-container">
                
            </div>
        </div>
    </div>
</body>