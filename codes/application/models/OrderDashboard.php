<?php 
defined ('BASEPATH') or exit('No direct script access allowed');

class OrderDashboard extends CI_Model {
    public function get_orders($status, $page, $receiver) {
    $this->single_xss_clean($status);
    $this->single_xss_clean($receiver);
    $this->single_xss_clean($page);

    $query = "SELECT orders.*, COUNT(order_details.order_id) AS order_count, 
        CONCAT(shipping_information.first_name, ' ', shipping_information.last_name) AS receiver_name,
        shipping_information.address_1 AS address
        FROM orders 
        LEFT JOIN order_details ON orders.id = order_details.order_id 
        LEFT JOIN shipping_information ON orders.id = shipping_information.order_id";
    $params = array();
    $values = array();
    if ($status != "all") {
        $params[] = "status = ?";
        $values[] = $status;
    }
    if ($receiver != "") {
        $params[] = "CONCAT(shipping_information.first_name, ' ', shipping_information.last_name) LIKE ?";
        $values[] = '%' . $receiver . '%'; 
    }

    if (!empty($params)) {
        $query .= " WHERE " . implode(" AND ", $params);
    }

    $query .= " GROUP BY orders.id";
    $query .= " ORDER BY created_at DESC";
    $query .= " LIMIT 10 OFFSET ?";
    $values[] = ($page - 1) * 10;
    
    return $this->db->query($query, $values)->result_array();
}

    public function get_count_by_status($status) {
        $this->single_xss_clean($status);
        $params = array();
        $values = array();

        $query = "SELECT COUNT(orders.id) AS count FROM orders";
        if ($status != "all") {
            $query .= " WHERE status = ?";
            $values[] = $status;
        }

        return $this->db->query($query, $values)->row_array();
    }

    public function get_all_count_by_status() {
        return array("all" => $this->get_count_by_status("all"), "pending" => $this->get_count_by_status("pending"), "on-process" => $this->get_count_by_status("on-process"), "shipped" => $this->get_count_by_status("shipped"), "delivered" => $this->get_count_by_status("delivered"));
    }

    public function update_status($status, $order_id) {
        $this->single_xss_clean($status);
        $this->single_xss_clean($order_id);

        $query = "UPDATE orders SET status = ? WHERE id = ?";
        $values = array($status, $order_id);
        return $this->db->query($query, $values);
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