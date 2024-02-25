<?php 
defined ('BASEPATH') or exit('No direct script access allowed');

class ProductDashboard extends CI_Model {

    public function get_categories() {
        $query = "SELECT categories.*, COUNT(products.category_id)  AS category_count
            FROM categories
            LEFT JOIN products ON categories.id = products.category_id
            GROUP BY categories.id;";
        return $this->db->query($query)->result_array();
    }
    
    public function get_all_products_count() {
        $query = "SELECT COUNT(*) as count FROM products";
        return $this->db->query($query)->row_array();
    }

    public function get_product_count_by_category($category) {
        $this->single_xss_clean($category);
        if ($category == "all") {
            return $this->get_all_products_count();
        } else {
        $query = "SELECT COUNT(*) as count FROM products WHERE category_id = ?";
        return $this->db->query($query, array($category))->row_array();
        }
    }

    public function get_products($category, $page, $search) {
        $query = "SELECT products.*, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id ";
        $params = array();
        $values = array();

        if ($category != "all") {
            $params[] = "products.category_id = ?";
            $values[] = $category;
        }
        
        if ($search != "") {
            $params[] = "products.name LIKE ?";
            $values[] = '%' . $search . '%';
        }

        if (!empty($params)) {
            $query .= " WHERE " . implode(" AND ", $params);
        }

        $query .= " LIMIT 10 OFFSET ?";
        $values[] = ($page - 1) * 10;

        return $this->db->query($query, $values)->result_array();
    }

    public function edit_product ($product_id) {
        $query = "SELECT * FROM products WHERE id = ?";
        return $this->db->query($query, array($product_id))->row_array();
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

