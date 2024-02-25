<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SpecificProducts extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('SpecificProduct');
        //! enable profiler
        $this->output->enable_profiler(FALSE);
    }

    public function index($product_id) {  
        //* Redirect to products page if product_id is not numeric
        if (!is_numeric($product_id)) {
            redirect('products');
        }

        $data['product'] = $this->SpecificProduct->get_product($product_id);

        //* Redirect to products page if product does not exist
        if (empty($data['product'])) {
            redirect(base_url("products"));
        }

        //* Get similar products randomly
        $data['similar_products'] = $this->SpecificProduct->get_similar_products($data['product']['category_id'], $product_id);
        

        //* Get reviews for the product
        $data['reviews'] = $this->SpecificProduct->get_reviews($product_id);

        $this->load->view('specific-product', $data);
    }
}