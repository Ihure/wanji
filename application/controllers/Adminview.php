<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/1/2018
 * Time: 8:56 AM
 */

class adminview extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adminpost_model');
        $this->load->model('post_model');
    }

    public function index() {
        $username = $this->session->userdata('username');

        if (isset($username)){

            $data['posts'] = $this->adminpost_model->get_posts();

            $this->load->view('main/adminheader');
            $this->load->view('main/adminsidebar');
            $this->load->view('adminposts/viewposts',$data);
            $this->load->view('main/adminfooter');

        }else {
            $data['headers'] = $this->post_model->get_headers();

            $this->load->view('main/header');
            $this->load->view('welcome_page/welcome', $data);
            $this->load->view('main/footer');
        }
    }

    public function delete_post ($id){

        $this->adminpost_model->delete_post($id);

        $data['posts'] = $this->adminpost_model->get_posts();

        $this->load->view('main/adminheader');
        $this->load->view('main/adminsidebar');
        $this->load->view('adminposts/viewposts',$data);
        $this->load->view('main/adminfooter');
    }

    public function delete_pic ($id){

        $this->adminpost_model->delete_pic($id);

        $data['post'] = $this->adminpost_model->get_post($id);
        $data['pics'] = $this->adminpost_model->get_pics($id);

        $this->load->view('main/adminheader');
        $this->load->view('main/adminsidebar');
        $this->load->view('adminposts/editpost',$data);
        $this->load->view('main/adminfooter');
    }

    public function get_post ($id){

        $data['post'] = $this->adminpost_model->get_post($id);
        $data['pics'] = $this->adminpost_model->get_pics($id);

        $this->load->view('main/adminheader');
        $this->load->view('main/adminsidebar');
        $this->load->view('adminposts/editpost',$data);
        $this->load->view('main/adminfooter');
    }
    public function add_photo (){

        $id = $this->input->post('add_id');

        $this->form_validation->set_rules('ad_title', 'Title', 'required');
        $this->form_validation->set_rules('add_desc', 'Short Description', 'required');
        if (empty($_FILES['ad_image']['name'])) {
            $this->form_validation->set_rules('ad_image', 'Document', 'required');
        }

        if ($this->form_validation->run() === FALSE) {

            $data['post'] = $this->adminpost_model->get_post($id);
            $data['pics'] = $this->adminpost_model->get_pics($id);

            $this->load->view('main/adminheader');
            $this->load->view('main/adminsidebar');
            $this->load->view('adminposts/editpost',$data);
            $this->load->view('main/adminfooter');

        }else{
            //config upload
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            //$config['max_size']             = 1000;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $new_name = time().$_FILES["ad_image"]['name'];
            $config['file_name'] = $new_name;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('ad_image')) {
                $data['error'] = array('error' => $this->upload->display_errors());

                $data['post'] = $this->adminpost_model->get_post($id);

                $this->load->view('main/adminheader');
                $this->load->view('main/adminsidebar');
                $this->load->view('adminposts/editpost',$data);
                $this->load->view('main/adminfooter');
            } else {
                $data['message'] ='Photo was added successfully';

                $fileUploadPath = $this->upload->data('full_path');
                $filename = $this->upload->data('file_name');

                $this->adminpost_model->add_photo($fileUploadPath, $filename, $id);

                $data['post'] = $this->adminpost_model->get_post($id);
                $data['pics'] = $this->adminpost_model->get_pics($id);

                $this->load->view('main/adminheader');
                $this->load->view('main/adminsidebar');
                $this->load->view('adminposts/editpost',$data);
                $this->load->view('main/adminfooter');

            }
        }

    }

    public function edit_post() {

        $id = $this->input->post('id');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('category', 'category', 'required');
        $this->form_validation->set_rules('desc', 'Short Description', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['post'] = $this->adminpost_model->get_post($id);
            $data['pics'] = $this->adminpost_model->get_pics($id);

            $this->load->view('main/adminheader');
            $this->load->view('main/adminsidebar');
            $this->load->view('adminposts/editpost',$data);
            $this->load->view('main/adminfooter');

        }else{

            if (empty($_FILES['image']['name'])) {
                $fileUploadPath ='';
                $filename = '';

                $this->adminpost_model->update_post($fileUploadPath, $filename,$id);

                $data['posts'] = $this->adminpost_model->get_posts();

                $this->load->view('main/adminheader');
                $this->load->view('main/adminsidebar');
                $this->load->view('adminposts/viewposts',$data);
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
                    $data['error'] = array('error' => $this->upload->display_errors());

                    $data['post'] = $this->adminpost_model->get_post($id);
                    $data['pics'] = $this->adminpost_model->get_pics($id);

                    $this->load->view('main/adminheader');
                    $this->load->view('main/adminsidebar');
                    $this->load->view('adminposts/editpost',$data);
                    $this->load->view('main/adminfooter');
                } else {
                    $data['message'] ='Post was updated successfully';

                    $fileUploadPath = $this->upload->data('full_path');
                    $filename = $this->upload->data('file_name');

                    $this->adminpost_model->update_post($fileUploadPath, $filename, $id);

                    $data['posts'] = $this->adminpost_model->get_posts();

                    $this->load->view('main/adminheader');
                    $this->load->view('main/adminsidebar');
                    $this->load->view('adminposts/viewposts',$data);
                    $this->load->view('main/adminfooter');

                }
            }
        }
    }
}