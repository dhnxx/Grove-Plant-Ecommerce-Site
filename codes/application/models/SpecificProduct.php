<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class SpecificProduct extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_product($product_id)
    {
        $this->single_xss_clean($product_id);

        $query = "SELECT products.*, ROUND(AVG(product_reviews.rating)) AS avg_rating, count(product_reviews.id) AS review_count FROM products LEFT JOIN product_reviews ON products.id = product_reviews.product_id WHERE products.id = ? GROUP BY products.id;";
        $value = array($product_id);
        return $this->db->query($query, $value)->row_array();
    }

    public function get_similar_products($category_id, $product_id)
    {
        $this->single_xss_clean($category_id);
        $this->single_xss_clean($product_id);

        $query = "SELECT * FROM products WHERE category_id = ? AND id != ? LIMIT 4";
        $value = array($category_id, $product_id);
        return $this->db->query($query, $value)->result_array();
    }

    public function get_reviews($product_id)
    {
        $this->single_xss_clean($product_id);

        $query = "SELECT product_reviews.*, CONCAT(users.first_name , ' ', users.last_name) as name FROM product_reviews  LEFT JOIN users ON product_reviews.user_id = users.id WHERE product_id = ? ORDER BY product_reviews.created_at DESC";
        $value = array($product_id);
        return $this->db->query($query, $value)->result_array();
    }

    private function single_xss_clean($post)
    {
        return $this->security->xss_clean($post);
    }

    private function xss_clean($post)
    {
        foreach ($post as $key => $value) {
            if (is_array($value)) {
                $this->xss_clean($value);
            } else {
                $post[$key] = $this->security->xss_clean($value);
            }
        }
    }
}