<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/6/2018
 * Time: 9:57 AM
 */

class portfolio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('post_model');
        $this->load->model('adminpost_model');
    }

    public function view ($category){

        $data['posts'] = $this->post_model->get_posts($category);
        $data['headers'] = $this->post_model->get_headers();
        $data['category'] = $category;

        $this->load->view('main/portheader', $data);
        $this->load->view('portfolio/viewport', $data);
        $this->load->view('main/portfooter');

    }

    public function view_item ($id){

        $dt = $this->adminpost_model->get_post($id);
        $data['post'] = $dt;
        $data['category'] = $dt['title'];
        $data['pics'] = $this->adminpost_model->get_pics($id);

        $this->load->view('main/portheader', $data);
        $this->load->view('portfolio/viewsingleitem', $data);
        $this->load->view('main/portfooter');

    }

}