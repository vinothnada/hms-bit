<?php 


class Guests extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->model('mcrud');
	}

	public function index(){
		$data['guestsdata'] = $this->mcrud->getAllDataAscStatusActive('guests','id');

		$this->load->view('includes/header_db');
		$this->load->view('superadmin/navigation');
		$this->load->view('guests/guestsmaster',$data);
		$this->load->view('includes/footer_inc_form');  		
	}

	public function editGuesData(){

      if(!$_POST){
        $whereArr = $_GET['id'];
    	$data["guestdata"] = $this->mcrud->getDataById('guests',$whereArr,'id');


        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('guests/editGuesData',$data);
        $this->load->view('includes/footer_inc_form');      
     
      }else{
       $whereArr = $this->input->post('id');    

	     $this->form_validation->set_rules('title','title','required');
	     $this->form_validation->set_rules('firstname','firstname','required');
	     $this->form_validation->set_rules('lastname','lastname','required');
	     $this->form_validation->set_rules('identityType','identityType','required');
	     $this->form_validation->set_rules('identityNo','identityNo','required');
	     $this->form_validation->set_rules('gender','gender','required');
	     $this->form_validation->set_rules('address','address','required');
	     $this->form_validation->set_rules('city','city','required');
	     $this->form_validation->set_rules('mobile','mobile','required');
	     $this->form_validation->set_rules('nationality','nationality','required');

       if ($this->form_validation->run() == FALSE) {
        $this->session->set_userdata('error', ' Guest updation failed!');
        redirect("guests");

      } else {

        $data = array(
          'title'=>$this->input->post('title'),
          'firstname'=>$this->input->post('firstname'),
          'lastname'=>$this->input->post('lastname'),
          'identityType'=>$this->input->post('identityType'),
          'identityNo'=>$this->input->post('identityNo'),
          'gender'=>$this->input->post('gender'),
          'address'=>$this->input->post('address'),
          'city'=>$this->input->post('city'),
          'mobile'=>$this->input->post('mobile'),
          'nationality'=>$this->input->post('nationality')
          );

        $result = $this->mcrud->updateDataByForm('guests', $data, array('id' => $whereArr));

        $this->session->set_userdata('success', ' Guest has been updated succesfully!');
        redirect("guests");
      }

    }  

	}

	public function deleteGuestData(){
	    $wherearr = $_GET['id'];

        $data = array(
          'status'=>'Blocked'
          );	    

	    $result = $this->mcrud->updateDataByForm('guests', $data, array('id' => $wherearr));
	    if ($result == true) {
	      $this->session->set_userdata('success', ' Guest has been deleted succesfully!');
	      redirect("guests");
	    }
	    $this->session->set_userdata('error', ' Error in deletion!');
	    redirect("guests");		
	}


}

?>