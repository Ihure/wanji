<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2018
 * Time: 8:18 AM
 */

class post_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_headers (){
        $query = $this->db->query("SELECT distinct category FROM blog where disabled !=1");
        return $query->result_array();
    }

    public function get_posts ( $category){

        $query = $this->db->query("SELECT * FROM blog where disabled !=1 and category = '$category'");

        return $query->result_array();
    }

    public function create_message(){

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message')
        );

        return $this->db->insert('messages', $data);
    }

    public function get_messages (){

        $query = $this->db->query("SELECT * FROM messages where deleted !=1 ORDER BY created desc");

        return $query->result_array();
    }

    public function delete_message ($id){

        $sql = "update messages set deleted=1 where autoid = ?";

        //$this->db->query($sql, array($id));

        return $this->db->query($sql, array($id));
    }

}