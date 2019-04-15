<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/30/2018
 * Time: 4:45 PM
 */

class adminpost_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function create_post( $filepath, $filename){

        $userid = $this->session->userdata('userid');

        $data = array(
            'title' => $this->input->post('title'),
            'details' => $this->input->post('desc'),
            'category' => $this->input->post('category'),
            'img_url' => $filepath,
            'file_name' => $filename,
            'userid' => $userid,
            'video_url' => $this->input->post('youtube')
        );

        return $this->db->insert('blog', $data);
    }

    public function update_post( $filepath, $filename, $id){

        $userid = $this->session->userdata('userid');
        $title = $this->input->post('title');
        $details = $this->input->post('desc');
        $category = $this->input->post('category');
        $videourl = $this->input->post('youtube');

        if(empty($filepath)){
            $sql = "update blog set title=?,details=?,userid=?,category=?,video_url=? where id = ?";

            return $this->db->query($sql, array($title,$details,$userid,$category,$videourl,$id));
        }else{
            $sql = "update blog set title=?,details=?,userid=?,category=?,img_url=?,file_name=?,video_url=? where id = ?";

            return $this->db->query($sql, array($title,$details,$userid,$category,$filepath,$filename,$videourl,$id));
        }
    }

    public function add_photo( $filepath, $filename, $id){

        $userid = $this->session->userdata('userid');
        $title = $this->input->post('ad_title');
        $details = $this->input->post('add_desc');

        $data = array(
            'title' => $title,
            'short_desc' => $details,
            'blogid' => $id,
            'img_url' => $filepath,
            'File_name' => $filename,
            'userid' => $userid
        );
        return $this->db->insert('pic_dets', $data);
    }

    public function get_posts (){

        $query = $this->db->get_where('blog', array('disabled' => 0));

        return $query->result_array();
    }

    public function delete_post ($id){

        $sql = "update blog set disabled=1 where id = ?";

        //$this->db->query($sql, array($id));

        return $this->db->query($sql, array($id));
    }

    public function delete_pic ($id){

        $sql = "DELETE FROM pic_dets where autoid = ?";

        //$this->db->query($sql, array($id));

        return $this->db->query($sql, array($id));
    }

    public function get_post ($id){

        $query = $this->db->get_where('blog', array('id' => $id));

        return $query->row_array();
    }

    public function get_pics ($id){

        $query = $this->db->query("SELECT * FROM pic_dets where blogid = '$id'");

        return $query->result_array();
    }

}