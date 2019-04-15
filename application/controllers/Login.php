<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/30/2018
 * Time: 11:57 AM
 */

class login extends  CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {


        $this->load->view('main/adminheader');
        $this->load->view('login/login');
        $this->load->view('main/adminfooter');
    }

    public function login(){


        //$data['title'] = 'Create a news item';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('main/adminheader');
            $this->load->view('login/login');
            $this->load->view('main/adminfooter');

        }
        else {
            $user = $this->login_model->get_user();

            $password = $this->input->post('password');

            $hash = $user->password;

            $admin = $user->admin;

            if(!empty($user)){
                if (password_verify($password, $hash) && $admin ==1) {
                    // Success!
                    $userdata = array(
                        'username'  => $user->username,
                        'email'     => $user->email,
                        'userid'     => $user->autoid,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($userdata);
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
                else {
                    $data['message'] ='Invalid Password';
                    $this->load->view('main/adminheader');
                    $this->load->view('login/login',$data);
                    $this->load->view('main/adminfooter');
                }
            }else {
                $data['message'] ='Username is wrong';
                $this->load->view('main/adminheader');
                $this->load->view('login/login',$data);
                $this->load->view('main/adminfooter');
            }

        }
    }
}