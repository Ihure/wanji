<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/9/2018
 * Time: 10:06 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('post_model');
    }

    public function index() {

        $data['headers'] = $this->post_model->get_headers();

        $this->load->view('main/header');
        $this->load->view('contact/contactview', $data);
        $this->load->view('main/footer');
    }

    public function sendmessage() {

        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'message', 'trim|required');

        if ($this->form_validation->run() === FALSE) {

            $data['headers'] = $this->post_model->get_headers();

            $this->load->view('main/header');
            $this->load->view('contact/contactview', $data);
            $this->load->view('main/footer');

        }
        else {
            $this->post_model->create_message();

            $data['headers'] = $this->post_model->get_headers();

            $this->load->view('main/header');
            $this->load->view('welcome_page/welcome', $data);
            $this->load->view('main/footer');
        }

    }
}