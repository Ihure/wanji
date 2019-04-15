<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/30/2018
 * Time: 1:31 PM
 */

class createpost extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adminpost_model');
    }

    public function index() {
        $username = $this->session->userdata('username');

        if (isset($username)){
            $this->load->view('main/adminheader');
            $this->load->view('main/adminsidebar');
            $this->load->view('adminposts/createpost');
            $this->load->view('main/adminfooter');
        }else {
            $this->load->view('main/header');
            $this->load->view('welcome_page/welcome');
            $this->load->view('main/footer');
        }
    }

    public function upload() {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('image', 'Document', 'required');
        }
        $this->form_validation->set_rules('desc', 'Short Description', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('main/adminheader');
            $this->load->view('main/adminsidebar');
            $this->load->view('adminposts/createpost');
            $this->load->view('main/adminfooter');

        }else{

            //config upload
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            //$config['max_size']             = 1000;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $new_name = time().$_FILES["image"]['name'];
            $config['file_name'] = $new_name;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());

                // $this->load->view('upload_form', $error);
                $this->load->view('main/adminheader');
                $this->load->view('main/adminsidebar');
                $this->load->view('adminposts/createpost',$error);
                $this->load->view('main/adminfooter');
            }
            else {
                $data['message'] ='Post was created successfully';

                $fileUploadPath = $this->upload->data('full_path');
                $filename = $this->upload->data('file_name');

                $this->adminpost_model->create_post($fileUploadPath, $filename);

                $this->load->view('main/adminheader');
                $this->load->view('main/adminsidebar');
                $this->load->view('adminposts/createpost',$data);
                $this->load->view('main/adminfooter');

            }
        }
    }

}