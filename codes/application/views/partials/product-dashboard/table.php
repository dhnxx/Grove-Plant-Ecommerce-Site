<div class="row mt-3 mt-md-0">
    <div class="col-12">
        <h2>Products</h2>
    </div>
</div>
<div class="mt-3 table-responsive">
    <table
        class="table table-striped text-center table-borderless align-items-center align-middle">
        <thead class="main-color text-light">
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product ID</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Stock</th>
                <th scope="col">Sold</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="roboto-regular">
<?php foreach ($products as $product) {?>
            <tr>
                <td><?= $product["name"] ?></td>
                <td><?= $product["id"] ?></td>
                <td><?= $product["price"] ?></td>
                <td><?= $product["category_name"] ?></td>
                <td><?= $product["stocks"] ?></td>
                <td><?= $product["sold"] ?></td>
                <td>
                    <div class="">
                        <div class="btn-group my-md-1">
                            <input
                                type="button"
                                value="Edit"
                                class="btn btn-primary edit_product" />
                        </div>
                        <div class="btn-group my-md-1">
                            <input
                                type="button"
                                value="Delete"
                                class="btn btn-danger delete_product" />
                        </div>
                    </div>
                </td>
            </tr>
<?php }?>
        </tbody>
    </table>
</div>
<div class="container mt-3">
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
<?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class="page-item">
                            <a class="page-link page_number" href="#" data-page="<?= $i ?>"><?= $i ?></a>
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
</div>
