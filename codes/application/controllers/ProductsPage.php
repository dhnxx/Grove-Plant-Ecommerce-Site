<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductsPage extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('productpage');
    }

    public function index() {
        $this->load->view('product-page');
    }

    public function index_categories() {
        $all_product_count = 0; 
        $data["categories"] = $this->productpage->get_categories();

        //* Get all product count
        foreach ($data["categories"] as $category) {
            $all_product_count += $category['product_count'];
        }

        $data["all_product_count"] = $all_product_count;

        $this->load->view('partials/product-page/categories', $data);
    }

    public function index_products($category_id = 0, $page = 1) {
        if ($category_id == "0") {
            //* Get all products and page count
            $data["products"] = $this->productpage->get_all_products($page);
            $data["count"] = $this->productpage->get_all_products_count();
        } else {

            //* Get products by category id and page count
            $data["products"] = $this->productpage->get_products_by_category($category_id, $page);
            $data["count"] = $this->productpage->get_products_by_category_count($category_id);
        }

        $this->load->view('partials/product-page/products', $data);
    }

    public function index_search($value) {

        //* Get products by search and page count
        $data["products"] = $this->productpage->get_products_by_search($value, 1);
        $data["count"] = $this->productpage->get_products_by_search_count($value);

        $this->load->view('partials/product-page/products', $data);
    }
}