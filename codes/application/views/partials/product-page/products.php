<?php foreach($products as $product) { ?>
<div class="col-6 col-md-6 col-lg-4">
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
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="col-auto ms-0 ms-xl-auto">
                    <p>85 Ratings</p>
                </div>
            </div>
        </div>
    </div>
</div>
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