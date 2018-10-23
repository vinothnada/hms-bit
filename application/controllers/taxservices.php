<?php 

/**
 * 
 */
class Taxservices extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('mcrud');
	}

	public function index(){
		$data["taxservicesdata"] = $this->mcrud->getAllDataDesc('taxservices','modifiedDate');
		$this->load->view('includes/header_db');
		$this->load->view('superadmin/navigation');
		$this->load->view('taxservices/index',$getAllDataDesc	);
		$this->load->view('includes/footer_db');		
	}
} 


?>
