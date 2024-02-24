<?php foreach($products as $product) { ?>
<a href="<?= base_url("product/view/" . $product["id"]) ?>" class="text-decoration-none text-dark col-6 col-md-6 col-lg-4">
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
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
<?php for ($i = 1; $i <= $count; $i++) { ?>
                    <li class="page-item">
                        <a class="page-link" href="<?= $i ?>"><?= $i ?></a>
                    </li>
<?php } ?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>