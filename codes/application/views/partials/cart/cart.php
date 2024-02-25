<?php foreach($cart as $product) {?>
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-sm-12 col-md-4">
            <img
                src="https://www.flowerpower.com.au/wordpress/wp-content/uploads/2023/01/fibreclay-ashton-pots.jpg"
                alt="..."
                class="cart-image img-fluid"
            />
        </div>
        <div class="col-sm-12 col-md-8  px-3">
            <div class="row">
                <div
                    class="card-body col-12"
                >
                    <div class="row">
                        <div class="col-auto">
                            <h4 class="card-title m-0 d-sm-inline-block"><?= $product["name"] ?></h4>
                            <p class="card-price m-0 d-sm-inline-block">$<?= $product["price"] ?></p>
                        </div>
                        <p class="col-12 col-sm-auto ms-sm-auto card-total-price">
                            Total Price: $<?= $product["total_price"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <p>Quantity</p>
                    </div>
                    <div class="row">
                        <form action="<?= base_url("carts/update_quantity") ?>" method="post" class="update-quantity-form">
                            <div class="input-group mb-3">
                                <input type="submit" class="btn btn-primary quantity-button" data-value="subtract" value="-" name="submit">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
                                <input
                                    type="text"
                                    class="form-control text-center"
                                    name="quantity"
                                    id="quantity-value"
                                    aria-describedby="basic-addon1"
                                    value="<?= $product["quantity"] ?>"
                                    readonly
                                />
                                <input type="hidden" name="cart_details_id" value="<?= $product["cart_details_id"] ?>">
                                <input type="submit" class="btn btn-primary quantity-button" value="+" data-value="add" name="add">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <p>Action</p>
                    </div>
                    <div class="row g-0">
                        <form method="post" action="<?= base_url("carts/remove_from_cart") ?>" class="d-grid remove-item-form">
                            <input type="submit" class="btn btn-primary" value="Delete">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
                            <input type="hidden" name="cart_details_id" value="<?= $product["cart_details_id"] ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div id="order_summary" data-shipping="<?= $order_summary["shipping"] ?>" data-subtotal="<?= $order_summary["subtotal"] ?>" data-total="<?= $order_summary["total"] ?>"></div>
