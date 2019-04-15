<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/30/2018
 * Time: 12:09 PM
 */

class login_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user()
    {
        $username = $this->input->post('username');

        $query = $this->db->get_where('login', array('username' => $username));

        return $query->row();
    }

}