<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserAuth extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
    }

    public function validate_login($user) {

        //* XSS Clean
        $this->xss_clean($user);

        //* Form Validation
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            //! Failed validation
            return array('status' => FALSE, 'errors' => array("email" => form_error('email'), "password" => form_error('password'),));
        } else {
            return array('status' => TRUE);
        }
    }

    public function login($user) {
        
        //* XSS Clean
        $this->xss_clean($user);

        //* Login Query
        $query = "SELECT * FROM users WHERE email = ? AND password = ?";
        $value = array($user['email'], md5($user['password']));
        $result = $this->db->query($query, $value)->row_array();

        if ($result) {
            return array('status' => TRUE, 'user' => $result);
        } else {
            return array('status' => FALSE, 'errors' => array("email" => "Invalid email or password", "password" => "Invalid email or password",));
        }
    }

    public function validate_signup($user) {

        //* XSS Clean
        $this->xss_clean($user);

        //* Form Validation
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|min_length[11]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            //! Failed validation
            return array('status' => FALSE, 'errors' => array("first_name" => form_error('first_name'), "last_name" => form_error('last_name'), "email" => form_error('email'), "contact_number" => form_error('contact_number'), "password" => form_error('password'), "confirm_password" => form_error('confirm_password'),));
        } else {
            return array('status' => TRUE);
        }
    }

    public function signup($user) {

        //* XSS Clean
        $this->xss_clean($user);

        //* Signup Query
        $query = "INSERT INTO users (first_name, last_name, email, contact_number, password, user_level, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
        
        $value = array($user['first_name'], $user['last_name'], $user['email'], $user['contact_number'], md5($user['password']), 1);
        $this->db->query($query, $value);

        //* Get User
        $query = "SELECT id, user_level FROM users WHERE email = ?";
        $value = array($user['email']);
        $result = $this->db->query($query, $value)->row_array();

        return array('status' => TRUE, 'user' => $result);
    }

    public function xss_clean($post) {
        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }     
    }   
}