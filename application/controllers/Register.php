<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 9/29/2018
 * Time: 1:43 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_model');
    }

    public function index() {


        $this->load->view('main/adminheader');
        $this->load->view('login/register');
        $this->load->view('main/adminfooter');
    }

    public function create(){


        //$data['title'] = 'Create a news item';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('main/adminheader');
            $this->load->view('login/register');
            $this->load->view('main/adminfooter');

        }
        else
        {
            $pass1 = $this->input->post('password1');
            $pass2 = $this->input->post('password2');

            if($pass1 == $pass2){

                $this->register_model->create_user();

                $this->load->view('main/header');
                $this->load->view('welcome_page/welcome');
                $this->load->view('main/footer');
            }else{
                $data['message'] ='Passwords do not match';

                $this->load->view('main/adminheader');
                $this->load->view('login/register',$data);
                $this->load->view('main/adminfooter');
            }

        }
    }

}