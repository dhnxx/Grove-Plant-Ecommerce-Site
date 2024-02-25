<div class="row mt-3 mt-md-0">
    <div class="col-12">
        <h2>Shipped Orders</h2>
    </div>
</div>
<div class="mt-3 table-responsive">
    <table
        class="table table-striped text-center table-borderless align-items-center align-middle"
    >
        <thead class="main-color text-light">
            <tr>
                <th scope="col">Product Count</th>
                <th scope="col">Order ID</th>
                <th scope="col">Order Date</th>
                <th scope="col">Receiver</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="roboto-regular">
<?php foreach ($orders as $order) { ?>
            <tr>
                <td><?= $order["order_count"] ?></td>
                <td><?= $order["id"] ?></td>
                <td class="roboto-light"><?= $order["created_at"] ?></td>
                <td>
                    <p class="m-0"><?= $order["receiver_name"] ?></p>
                    <span class="address"><?= $order["address"] ?></span>
                </td>
                <td>$<?= $order["total_amount"] ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary current-status">
                            <?= ucwords($order["status"])?>
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
<?php foreach ($statuses as $status) { ?>
                            <li>
                                <a class="dropdown-item status" href="admins/update_status/<?= $status . "/" . $order["id"] ?>" data-order-id="<?= $order["id"] ?>" data-status="<?= $status ?>"> <?= ucwords($status) ?></a>
                            </li>
<?php } ?>
                        </ul>
                    </div>
                </td>
            </tr>
<?php } ?>
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