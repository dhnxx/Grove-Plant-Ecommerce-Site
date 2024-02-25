<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrdersDashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('orderdashboard');
    }

    public function index() {
        $data['status_count'] = $this->orderdashboard->get_all_count_by_status();
        $this->load->view('admin-order-dashboard', $data);
    }

    public function order_table($status="all", $page = "1", $receiver ="") {
        //* Get Orders
        $data['orders'] = $this->orderdashboard->get_orders($status, $page, $receiver);
        $data['statuses'] = array("pending", "on-process", "shipped", "delivered");
        $data['total_pages'] = ceil($this->orderdashboard->get_count_by_status($status)["count"] / 10);

        $this->load->view('partials/order-dashboard/orders-table', $data);
    }

    public function update_status($status, $order_id) {
        $this->orderdashboard->update_status($status, $order_id);
    }
}