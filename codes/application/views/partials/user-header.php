<header class="navbar-dark main-color sticky-top">
    <div class="container">
        <div
            class="row py-3 d-flex align-items-center text-center text-md-start"
            id="header">
            <div class="col-sm-12 col-md-6">
                <a class="navbar-brand sofia-regular" href="<?=base_url("products")?>">
                    <img
                        src="<?= base_url('assets/images/leaf.png') ?>"
                        alt="Logo"
                        width="30"
                        height="24"
                        class="d-inline-block align-text-center"/>
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
                <form action="<?= base_url("product/search")?>" method="get" class="d-flex align-items-center" id="search-bar">
                    <img
                        src="<?= base_url('assets/images/leaf.png') ?>"
                        alt=""
                        class="me-2 d-none"
                        id="search-bar-brand"
                    />
                    <input
                        class="form-control me-2"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                        name="value"
                    />
                    <input class="btn btn-secondary me-2" type="submit" value="Search" />
                    <a
                        type="button"
                        class="btn btn-secondary position-relative me-2 search-bar-image"
                        href="user-profile.html"
                    >
                        <img src="<?= base_url('assets/images/avatar.png') ?>" alt="" />
                    </a>
                    <a
                        type="button"
                        class="btn btn-secondary position-relative search-bar-image"
                        href="cart.html"
                    >
                        <img src="<?= base_url('assets/images/shopping-cart.png') ?>" alt="" />
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none d-sm-block"
                        >
                            99+
                            <span class="visually-hidden">Item Count</span>
                        </span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</header>