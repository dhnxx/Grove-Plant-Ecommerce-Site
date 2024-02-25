<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductsDashboard extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
            $this->load->model('productdashboard');
        }
    
        public function index() {
            $this->load->view('admin-product-dashboard');
        }
    
        public function product_table($category="all", $page = "1", $search = "") {
            //* Get Products
            $data['products'] = $this->productdashboard->get_products($category, $page, $search);

            $data['total_pages'] = ceil($this->productdashboard->get_product_count_by_category($category)["count"] / 10);
    
            $this->load->view('partials/product-dashboard/table', $data);
        }

        public function get_categories() {
            $data['categories'] = $this->productdashboard->get_categories();
            $data['all_count'] = $this->productdashboard->get_all_products_count();
            $this->load->view('partials/product-dashboard/categories', $data);
        }
    
        public function update_status($status, $product_id) {
            $this->productdashboard->update_status($status, $product_id);
        }

        public function add_product() {
            //! Add Product
        }
}
