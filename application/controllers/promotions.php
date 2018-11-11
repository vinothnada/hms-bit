<?php

class Promotions extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('mcrud');
    }

	public function index(){

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('promotions/home');
        $this->load->view('includes/footer_inc_form');  		
	}
}


?>