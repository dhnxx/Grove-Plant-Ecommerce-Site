<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use Stripe\Stripe;
use Stripe\Charge;

require_once APPPATH . '../vendor/autoload.php';

class Cart extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function create_cart($user_id) {
        $query = "INSERT INTO carts (user_id,created_at,updated_at) VALUES (?, NOW(), NOW())";
        $value = array($user_id);
        return $this->db->query($query, $value);
    }

    public function get_cart_count($user_id) {

        $this->single_xss_clean($user_id);

        $query = "SELECT COUNT(cart_details.id) as count FROM cart_details 
        LEFT JOIN carts ON cart_details.cart_id = carts.id
        WHERE user_id = ?";
        $value = array($user_id);
        return $this->db->query($query, $value)->row_array();
    }

    public function add_to_cart($product) {

        $this->xss_clean($product);

        $cart = $this->get_cart();
        if (empty($cart)) {
            $this->create_cart($product['user_id']);
            $cart = $this->get_cart();
        }
        $query = "INSERT INTO cart_details (cart_id,product_id,quantity,created_at,updated_at) VALUES (?, ?, ?, NOW(), NOW())";
        $value = array($cart['id'], $product['product_id'], $product['quantity']);
        return $this->db->query($query, $value);
    }

    public function get_cart() {
        $query = "SELECT * FROM carts WHERE user_id = ?";
        $value = array($this->session->userdata('user')['id']);
        return $this->db->query($query, $value)->row_array();
    }

    public function get_cart_items($user_id) {

        $this->single_xss_clean($user_id);

        $query = "SELECT products.id AS id, cart_details.id AS cart_details_id, products.name AS name, products.price AS price, cart_details.quantity AS quantity, 
        products.price * cart_details.quantity as total_price FROM cart_details 
        LEFT JOIN products ON cart_details.product_id = products.id
        LEFT JOIN carts ON cart_details.cart_id = carts.id
        WHERE user_id = ?";
        $value = array($user_id);
        return $this->db->query($query, $value)->result_array();
    }

    public function remove_from_cart ($cart_details_id) {

        $this->single_xss_clean($cart_details_id);

        $query = "DELETE FROM cart_details WHERE id = ?";
        $value = array($cart_details_id);
        return $this->db->query($query, $value);
    }

    public function update_quantity($product) {

        $this->xss_clean($product);

        if ($product["submit"] === "add") {
            $product['quantity']++;
        } else {
            $product['quantity']--;
        }

        $query = "UPDATE cart_details SET quantity = ? WHERE id = ?";
        $value = array($product['quantity'], $product['cart_details_id']);
        return $this->db->query($query, $value);
    }

    public function get_subtotal_price($user_id) {

        $this->single_xss_clean($user_id);

        $query = "SELECT SUM(products.price * cart_details.quantity) as subtotal FROM cart_details 
        LEFT JOIN products ON cart_details.product_id = products.id
        LEFT JOIN carts ON cart_details.cart_id = carts.id
        WHERE user_id = ?";
        $value = array($user_id);
        return $this->db->query($query, $value)->row_array();
    }

    public function same_as_billing_info($post) {
        $this->xss_clean($post);
        if ($post['same_as_billing_info'] == "off") {
            //* Different billing and shipping info
            $shipping_info = array(
                "first_name" => $post['shipping_first_name'],
                "last_name" => $post['shipping_last_name'],
                "address_1" => $post['shipping_address_1'],
                "address_2" => $post['shipping_address_2'],
                "city" => $post['shipping_city'],
                "state" => $post['shipping_state'],
                "zip" => $post['shipping_zip']
            );
            $billing_info = array(
                "first_name" => $post['billing_first_name'],
                "last_name" => $post['billing_last_name'],
                "address_1" => $post['billing_address'],
                "address_2" => $post['billing_address_2'],
                "city" => $post['billing_city'],
                "state" => $post['billing_state'],
                "zip" => $post['billing_zip']
            );
            $information = array(
                "shipping_info" => $shipping_info,
                "billing_info" => $billing_info
            );
            return $information;
        } else {
            //* Same as billing info
            $shipping_info = array(
                "first_name" => $post['shipping_first_name'],
                "last_name" => $post['shipping_last_name'],
                "address_1" => $post['shipping_address_1'],
                "address_2" => $post['shipping_address_2'],
                "city" => $post['shipping_city'],
                "state" => $post['shipping_state'],
                "zip" => $post['shipping_zip']
            );
            $information = array(
                "shipping_info" => $shipping_info,
                "billing_info" => $shipping_info
            );
            return $information;
        }
    }

    public function insert_order() {
        $query = "INSERT INTO orders (status,total_amount,created_at,updated_at) VALUES (?, ?,NOW(), NOW())";

        $subtotal_amount = $this->get_subtotal_price($this->session->userdata('user')['id']);

        $total_amount = $subtotal_amount['subtotal'] + 5; // * Fixed shipping fee

        $value = array("pending", $total_amount);
        $this->db->query($query, $value);

        return $this->db->query("SELECT LAST_INSERT_ID() as id")->row_array();
    }

    public function insert_shipping_billing_info ($information, $order_id) {

        $this->xss_clean($information);
        $this->single_xss_clean($order_id);

        $query = "INSERT INTO shipping_information (order_id,first_name,last_name,address_1,address_2,city,state,zip,created_at,updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $value = array($order_id['id'], $information['shipping_info']['first_name'], $information['shipping_info']['last_name'], $information['shipping_info']['address_1'], $information['shipping_info']['address_2'],$information['shipping_info']['city'], $information['shipping_info']['state'], $information['shipping_info']['zip']);

        $this->db->query($query, $value);

        $query = "INSERT INTO billing_information (order_id,first_name,last_name,address_1,address_2,city,state,zip,created_at,updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";

        $value = array($order_id['id'], $information['billing_info']['first_name'], $information['billing_info']['last_name'], $information['billing_info']['address_1'], $information['billing_info']['address_2'],$information['billing_info']['city'], $information['billing_info']['state'], $information['billing_info']['zip']);

        $this->db->query($query, $value);
    }

    public function process_payment($card_details, $total, $billing_info, $order_id) {
        $stripe_secret_key = $this->config->item('stripe_secret_key');
        Stripe::setApiKey($stripe_secret_key);

        $charge = Charge::create([
            'amount' => $total['subtotal'] * 100,
            'currency' => 'usd',
            'source' => "tok_visa", 
            'description' => 'Payment for Order ID: ' . $order_id['id'],
        ]);

        //* Return receipt link
        return $charge->receipt_url;
    }

    public function transfer_cart_to_order_details ($order_id) {
        $this->single_xss_clean($order_id);
        $query = "INSERT INTO order_details (order_id,product_id,quantity,created_at,updated_at) SELECT ?, product_id, quantity, NOW(), NOW() FROM cart_details WHERE cart_id = ?";
        $value = array($order_id['id'], $this->get_cart()['id']);
        $this->db->query($query, $value);
    }

    public function remove_cart ($user_id) {
        $this->single_xss_clean($user_id);
        
        $query = "DELETE cart_details 
        FROM cart_details 
        LEFT JOIN carts ON cart_details.cart_id = carts.id
        WHERE carts.user_id = ?;";
        $value = array($user_id);

        $this->db->query($query, $value);
    }

    public function xss_clean($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }
    }

    public function single_xss_clean($post) {
        $post = $this->security->xss_clean($post);
    }

}