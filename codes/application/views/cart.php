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
    <!-- Load Cart Page Scripts -->
    <script src=<?= base_url("assets/scripts/local/cart/cart.js") ?> ></script>
    <link rel="stylesheet" href="<?= base_url("assets/css/local/cart.css")?>">
</head>
    <body>
        <!-- Load User Header --> 
        <header class="navbar-dark main-color sticky-top" id="header-container">
        <?php $this->load->view('partials/user-header'); ?>
        </header>
        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="product-page.html">Home Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-sm-12 col-lg-8" id="cart-container"></div>
                    <div class="col-sm-12 col-lg-4">
                        <form action="<?= base_url("carts/process_order") ?>" method="post" id="checkout-form">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
                        <div class="card mb-3" id="shipping-information">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="card-title">Shipping Information</h5>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-check form-switch d-flex justify-content-end">
                                            <input
                                                class="form-check-input me-1"
                                                type="checkbox"
                                                id="flexSwitchCheckDefault"
                                                name="same_as_billing_info"
                                                checked
                                            />
                                            <label class="form-check-label" for="flexSwitchCheckDefault"
                                                >Same as Billing</label
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="shippingName" class="form-label"
                                                >First Name</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingName"
                                                placeholder="John"
                                                name="shipping_first_name"
                                            />
                                        </div>
                                        <div class="col-6">
                                            <label for="shippingName" class="form-label"
                                                >Last Name</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingName"
                                                placeholder="Doe"
                                                name="shipping_last_name"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingAddress" class="form-label">Address</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="shippingAddress"
                                        placeholder="1234 Main St"
                                        name="shipping_address_1"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="shippingAddress2" class="form-label">Address 2</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="shippingAddress2"
                                        placeholder="Apartment, studio, or floor"
                                        name="shipping_address_2"
                                    />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="shippingCity" class="form-label">City</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingCity"
                                                placeholder="City"
                                                name="shipping_city"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="shippingState" class="form-label">State</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingState"
                                                placeholder="State"
                                                name="shipping_state"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingZip" class="form-label">Zip</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="shippingZip"
                                        placeholder="Zip"
                                        name="shipping_zip"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 d-none" id="billing-information">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="card-title">Billing Information</h5>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="shippingName" class="form-label"
                                                >First Name</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingName"
                                                placeholder="John"
                                                name="billing_first_name"
                                            />
                                        </div>
                                        <div class="col-6">
                                            <label for="shippingName" class="form-label"
                                                >Last Name</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingName"
                                                placeholder="Doe"
                                                name="billing_last_name"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingAddress" class="form-label">Address</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="shippingAddress"
                                        placeholder="1234 Main St"
                                        name="billing_address_1"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="shippingAddress2" class="form-label">Address 2</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="shippingAddress2"
                                        placeholder="Apartment, studio, or floor"
                                        name="billing_address_2"
                                    />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="shippingCity" class="form-label">City</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingCity"
                                                placeholder="City"
                                                name="billing_city"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="shippingState" class="form-label">State</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="shippingState"
                                                placeholder="State"
                                                name="billing_state"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingZip" class="form-label">Zip</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="shippingZip"
                                        placeholder="Zip"
                                        name="billing_zip"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Order Summary</h5>
                                <p id="subtotal" class="card-text">Subtotal: $10.00</p>
                                <p id="shipping" class="card-text">Shipping: $5.00</p>
                                <p id="total" class="card-text">Total: $15.00</p>
                                <div class="d-grid">
                                    <button type="button" class="btn btn-primary checkout">Checkout</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <!--Checkout Modal-->
        <div
            class="modal fade"
            id="checkoutModal"
            tabindex="-1"
            aria-labelledby="checkoutModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nameOnCard" class="form-label">Name on Card</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nameOnCard"
                                        placeholder="John Doe"
                                    />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="creditCard" class="form-label">Credit Card</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="creditCard"
                                        placeholder="1234 5678 9101 1121"
                                    />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="expirationDate" class="form-label"
                                        >Expiration Date</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="expirationDate"
                                        placeholder="MM/YY"
                                    />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="cvv"
                                        placeholder="123"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Pay</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>
