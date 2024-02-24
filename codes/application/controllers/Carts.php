<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart');
    }

    public function index()
    {
        //$this->load->view('cart');
    }

    public function refresh_header()
    {
        $this->load->view('partials/user-header');
    }

    public function add_to_cart()
    {
        //* Add to cart
        $this->cart->add_to_cart($this->input->post(NULL, TRUE));

        //* Update cart session
        $this->session->set_userdata('cart', $this->cart->get_cart_count
        ($this->session->userdata('user')['id']));
    }

    public function remove_from_cart($product_id)
    {
        // $this->cart->remove_from_cart($product_id);
        // redirect('carts');
    }

    public function update_cart()
    {
        // $this->cart->update_cart();
        // redirect('carts');
    }
}