<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/29/2018
 * Time: 5:29 PM
 */

class register_model extends  CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function create_user()
    {
        $pwd = $this->input->post('password1');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'password' => password_hash($pwd, PASSWORD_DEFAULT)
        );

        return $this->db->insert('login', $data);
    }

}