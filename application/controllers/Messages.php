<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/11/2018
 * Time: 9:59 AM
 */

class messages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('post_model');
    }

    public function index (){
        $username = $this->session->userdata('username');

        if (isset($username)){

            $data['messages'] = $this->post_model->get_messages();

            $this->load->view('main/adminheader');
            $this->load->view('main/adminsidebar');
            $this->load->view('adminposts/viewmessages',$data);
            $this->load->view('main/adminfooter');

        }else {
            $data['headers'] = $this->post_model->get_headers();

            $this->load->view('main/header');
            $this->load->view('welcome_page/welcome', $data);
            $this->load->view('main/footer');
        }

    }

    public function delete_message ($id){

        $this->post_model->delete_message($id);

        $data['messages'] = $this->post_model->get_messages();

        $this->load->view('main/adminheader');
        $this->load->view('main/adminsidebar');
        $this->load->view('adminposts/viewmessages',$data);
        $this->load->view('main/adminfooter');
    }

}