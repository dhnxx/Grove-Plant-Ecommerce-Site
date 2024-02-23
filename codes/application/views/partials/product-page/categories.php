<button
    type="button"
    class="btn btn-secondary position-relative card-categories hover-effect"
    category_name="all"
    category_id="0"
    style="
        background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            ),
            url('<?=("/") ?>');
    ">
All Products
    <span
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color">
<?= $all_product_count ?>

        <span class="visually-hidden">Item Count</span>
    </span>
</button>

<?php foreach ($categories as $category) { ?>
<button
    type="button"
    class="btn btn-secondary position-relative card-categories hover-effect"
    category_name="<?= $category['name'] ?>"
    category_id="<?= $category['id'] ?>"
    style="
        background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            ),
            url('<?=($category['image_url']) ?>');
    ">
<?= $category['name'] ?>
    <span
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color">
<?= $category['product_count'] ?>
        <span class="visually-hidden">Item Count</span>
    </span>
</button>
<?php } ?>