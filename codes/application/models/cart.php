<?php 
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function get_cart() {

        $user_id = $this->session->userdata('user')['id'];
        $this->single_xss_clean($user_id);

        $query = "SELECT * FROM carts WHERE user_id = ?";
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
    
    public function xss_clean($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }
    }

    public function single_xss_clean($post) {
        $post = $this->security->xss_clean($post);
    }

}