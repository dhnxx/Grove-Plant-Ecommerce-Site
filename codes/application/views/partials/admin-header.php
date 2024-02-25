<div class="container">
    <div
        class="row py-3 d-flex align-items-center text-center text-md-start"
        id="header"
    >
        <div class="col-sm-12 col-md-6">
            <a class="navbar-brand sofia-regular" href="product-page.html">
                <img
                    src="<?= base_url('assets/images/leaf.png') ?>"
                    alt="Logo"
                    width="30"
                    height="24"
                    class="d-inline-block align-text-center"
                />
                Garden Grove Co
            </a>
        </div>
        <div class="d-none d-md-block col-md-6 justify-self-end text-end">
            <span class="roboto-thin text-white">
                Where Every Garden Finds Its Grove
            </span>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-12">
            <form class="d-flex align-items-center" id="search-bar">
                <img
                    src="<?= base_url('assets/images/leaf.png') ?>"
                    alt=""
                    class="me-2 d-none"
                    id="search-bar-brand"
                />
                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search Product"
                    aria-label="Search"
                    id="search_text"
                />
                <input
                    class="btn btn-secondary me-2"
                    type="submit"
                    value="Add Product"
                    id="search_button"
                />
                <a
                    type="button"
                    class="btn btn-secondary position-relative me-2 search-bar-image"
                    href="../pages/admin-order-dashboard.html"
                >
                    <img src="<?= base_url('assets/images/order.png') ?>" alt="" />
                </a>
                <a
                    type="button"
                    class="btn btn-secondary position-relative search-bar-image"
                    href="../pages/admin-product-dashboard.html"
                >
                    <img src="<?= base_url('assets/images/package.png') ?>" alt="" />
                </a>
            </form>
        </div>
    </div>
</div>