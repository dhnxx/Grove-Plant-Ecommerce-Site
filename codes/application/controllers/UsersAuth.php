<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersAuth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('UserAuth');
		$this->load->model('cart');
	}

	public function index() {
		$this->load->view('users-auth');
	}

	//* Loads the login form
	public function index_login() {
		$data = array('errors' => array());
		$this->load->view('partials/auth/users-login', $data);
	}

	//* Loads the signup form
	public function index_signup() {
		$data = array('errors' => array());
		$this->load->view('partials/auth/users-signup', $data);
	}

	//* Validates the login form
	public function validate_login() {
		$validation = $this->UserAuth->validate_login($this->input->post());
		if ($validation['status'] === FALSE) {
			$data = array('errors' => $validation['errors']);
			$this->load->view('partials/auth/users-login', $data);
		} else {
			$login_data = $this->UserAuth->login($this->input->post());
			if ($login_data['status'] === FALSE) {
				$data = array('errors' => $login_data['errors']);
				$this->load->view('partials/auth/users-login', $data);
			} else {
				$this->session->set_userdata('user', $login_data['user']);
				//* Cart session 
				$cart = $this->cart->get_cart_count($login_data['user']['id']);
				$this->session->set_userdata('cart', $cart);
				echo "success";
			}
		}
	}

	//* Validates the signup form
	public function validate_signup() {
		$validation = $this->UserAuth->validate_signup($this->input->post());
		if ($validation['status'] === FALSE) {
			$data = array('errors' => $validation['errors']);
			$this->load->view('partials/auth/users-signup', $data);
		} else {
			$signup_data = $this->UserAuth->signup($this->input->post());
			if ($signup_data['status'] === FALSE) {
				$data = array('errors' => $signup_data['errors']);
				$this->load->view('partials/auth/users-signup', $data);
			} else {
				//* Log the user in
				$this->session->set_userdata('user', $signup_data['user']);
				//* Create cart for the user
				$this->cart->create_cart($signup_data['user']['id']);
				//* Cart session 
				$cart = $this->cart->get_cart_count($signup_data['user']['id']);
				$this->session->set_userdata('cart', $cart);
				echo "success";
			}
		}
	}
}
