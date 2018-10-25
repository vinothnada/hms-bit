<?php 

class Taxservices extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('mcrud');
	}

	public function index(){
		$data["taxservicesdata"] = $this->mcrud->getAllDataDesc('taxservices','modifiedDate');
		$this->load->view('includes/header_db');
		$this->load->view('superadmin/navigation');
		$this->load->view('taxservices/index',$data);
		$this->load->view('includes/footer_db');		
	}


	public function updateRates(){

		$this->form_validation->set_rules('type','type','required');
		$this->form_validation->set_rules('rate','rate','required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('error', ' Tex rates creation failed!');
			redirect("Taxservices");
		} else {
			$typecheck = $this->input->post('type');

			if ($typecheck == "Tax") {
			$data = array(
				'name'=>$this->input->post('type'),
				'type'=>"Tax",
				'value'=>$this->input->post('rate'),
				);
			}else{
			$data = array(
				'name'=>$this->input->post('type'),
				'type'=>"ServiceCharge",
				'value'=>$this->input->post('rate'),
				);
			}

			$result = $this->mcrud->addDataByForm('taxservices',$data);
			$this->session->set_userdata('success', ' Tex rates has been added succesfully!');
			redirect("Taxservices");
		}   

	}
} 


?>
