<?php 

class ProductPage extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_categories() {
        $query = "SELECT categories.*, COUNT(products.id) AS product_count 
            FROM categories 
            LEFT JOIN products ON categories.id = products.category_id
            GROUP BY categories.id;";
        return $this->db->query($query)->result_array();
    }

    public function get_all_products($page) {
        $this->single_xss_clean($page);
        $offset = ($page - 1) * 6;
        $query = "SELECT products.*, ROUND(AVG(product_reviews.rating)) AS avg_rating, COUNT(product_reviews.id) AS review_count 
        FROM products 
        LEFT JOIN product_reviews ON products.id = product_reviews.product_id 
        GROUP BY products.id
        LIMIT 6 OFFSET ?";
        $value = array($offset);
        return $this->db->query($query, $value)->result_array();
    }

    public function get_all_products_count() {
        $query = "SELECT COUNT(id) AS count FROM products";
        $count = $this->db->query($query)->row_array();
        return ceil($count['count'] / 6);
    }

    public function get_products_by_category($category_id, $page) { 
        $this->single_xss_clean($page);
        $this->single_xss_clean($category_id);

        $offset = ($page - 1) * 6;

        $query = "SELECT products.*, ROUND(AVG(product_reviews.rating)) AS avg_rating, COUNT(product_reviews.id) AS review_count 
        FROM products 
        LEFT JOIN product_reviews ON products.id = product_reviews.product_id
        WHERE category_id = ? 
        GROUP BY products.id
        LIMIT 6 OFFSET ?;";
        $value = array($category_id, $offset); 
        return $this->db->query($query, $value)->result_array();
    }

    public function get_products_by_category_count($category_id) {
        $this->single_xss_clean($category_id);

        $query = "SELECT COUNT(id) AS count FROM products WHERE category_id = ?";
        $value = array($category_id);
        $count = $this->db->query($query, $value)->row_array();
        return ceil($count['count'] / 6);
    }

    public function get_category_id($category) {
        $this->single_xss_clean($category);

        $query = "SELECT id FROM categories WHERE name = ?";
        $value = array($category);
        return $this->db->query($query, $value)->row_array();
    }

    private function xss_clean($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }     
    }   

    private function single_xss_clean($value) {
        return $this->security->xss_clean($value);
    }

}