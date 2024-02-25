<button
    type="button"
    class="btn btn-secondary position-relative card-categories hover-effect"
    data-category="all"
    style="
        background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            ),
            url('https://www.flowerpower.com.au/wordpress/wp-content/uploads/2023/01/fibreclay-ashton-pots.jpg');
    ">
    All Products
    <span
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color">
        <?= $all_count['count']?>
        <span class="visually-hidden">Item Count</span>
    </span>
</button>
<?php foreach ($categories as $category) {?>
<button
    type="button"
    class="btn btn-secondary position-relative card-categories hover-effect"
    data-category="<?= $category['id']?>"
    style="
        background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            ),
            url('https://www.flowerpower.com.au/wordpress/wp-content/uploads/2023/01/fibreclay-ashton-pots.jpg');
    ">
    <?= $category['name']?>
    <span
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill tertiary-color">
        <?= $category['category_count']?>
        <span class="visually-hidden">Item Count</span>
    </span>
</button>
<?php }?>

