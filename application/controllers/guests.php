<?php 


class Guests extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('mcrud');
	}

	public function index(){
		$data['guestsdata'] = $this->mcrud->getAllDataAsc('guests','id');

		$this->load->view('includes/header_db');
		$this->load->view('superadmin/navigation');
		$this->load->view('guests/guestsmaster',$data);
		$this->load->view('includes/footer_inc_form');  		
	}
}

?>