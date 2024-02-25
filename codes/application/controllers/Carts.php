<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carts extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('cart');
    }

    public function index() {
        $this->load->view('cart');
    }

    public function index_cart() {
        //* Get cart items
        $data["cart"] = $this->cart->get_cart_items($this->session->userdata('user')['id']);

        //* Get order summary data
        $data["order_summary"] = [
            "subtotal" => 0,
            "shipping" => 0,
            "total" => 0
        ];
        
        $subtotal = $this->cart->get_subtotal_price($this->session->userdata('user')['id']);

        $data["order_summary"]["subtotal"] = $subtotal["subtotal"];

        $data["order_summary"]["shipping"] = 5; // * Fixed shipping fee
        $data["order_summary"]["total"] = $data["order_summary"]["subtotal"] + $data["order_summary"]["shipping"];

        $this->load->view('partials/cart/cart', $data);
    }

    public function add_to_cart() {
        //* Add to cart
        $this->cart->add_to_cart($this->input->post(NULL, TRUE));

        //* Update cart session
        $this->update_cart_session();
    }

    public function remove_from_cart() {
        $this->cart->remove_from_cart($this->input->post
        ('cart_details_id'));

        //* Update cart session
        $this->update_cart_session();
    }

    public function update_cart_session() {
        $this->session->set_userdata('cart', $this->cart->get_cart_count
        ($this->session->userdata('user')['id']));
    }

    public function refresh_header() {
        $this->load->view('partials/user-header');
    }

    public function update_quantity() {
        $this->cart->update_quantity($this->input->post(NULL, TRUE));
        var_dump($this->input->post(NULL, TRUE));   
    }

    public function process_order() {
        //! Add Validation here 

        //* Check if same as billing info is checked
        $information = $this->cart->same_as_billing_info($this->input->post(NULL, TRUE));

        //* Process payment with Stripe
        $card_details = array(
            "number" => $this->input->post('card_number'),
            "name" => $this->input->post('name_on_card'),
            "exp_date" => $this->input->post('exp_date'),
            "cvc" => $this->input->post('cvc')
        );

        $total = $this->cart->get_subtotal_price($this->session->userdata('user')['id']);

        //* Insert order from cart
        $order_id = $this->cart->insert_order();

        //* Process payment with Stripe
        $receipt_link = $this->cart->process_payment($card_details, $total, $information['billing_info'], $order_id);

        //* Insert shipping and billing info
        $this->cart->insert_shipping_billing_info($information, $order_id);

        //* Transfer cart items to order details
        $this->cart->transfer_cart_to_order_details($order_id);

        //* Remove cart and cart details
        $this->cart->remove_cart($this->session->userdata('user')['id']);

        //* Update cart session
        $this->update_cart_session();

        echo json_encode($receipt_link);
    }

}