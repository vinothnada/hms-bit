<?php

class Restaurant extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('mcrud');
        $this->load->model('mrestaurant');
    }

	public function tablemaster(){
 		$data['tabledata'] = $this->mrestaurant->getRetaurantTableData();

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('restaurant/tablemaster',$data);
        $this->load->view('includes/footer_inc_form');  		
	}


    public function addNewTable(){

         $this->form_validation->set_rules('tblnum','tblnum','required');
         $this->form_validation->set_rules('seats','seats','required');
         $this->form_validation->set_rules('status','status','required');
         $this->form_validation->set_rules('cat','cat','required');

       if ($this->form_validation->run() == FALSE) {
        $this->session->set_userdata('error', ' Table creation failed!');
        redirect("restaurant/tablemaster");
      } else {
        $data = array(
            'tblnum'=>$this->input->post('tblnum'),
            'seats'=>$this->input->post('seats'),
            'status'=>$this->input->post('status'),
            'cat'=>$this->input->post('cat'),
          );
        $result = $this->mcrud->addDataByForm('table_master',$data);
        $this->session->set_userdata('success', ' Table has been added succesfully!');
        redirect("restaurant/tablemaster");
      }    
    }



    public function editTableMaster(){

      if(!$_POST){
        $whereArr = $_GET['id'];
        $data["tabelInfo"] = $this->mcrud->getDataById('table_master', $whereArr, 'id');

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('restaurant/editTableMaster',$data);
        $this->load->view('includes/footer_inc_form');      
      }else{
       $whereArr = $this->input->post('id');    

         $this->form_validation->set_rules('tblnum','tblnum','required');
         $this->form_validation->set_rules('seats','seats','required');
         $this->form_validation->set_rules('status','status','required');
         $this->form_validation->set_rules('cat','cat','required');

       if ($this->form_validation->run() == FALSE) {
        $this->session->set_userdata('error', ' Table updation failed!');
        redirect("restaurant/tablemaster");

      } else {

        $data = array(
            'tblnum'=>$this->input->post('tblnum'),
            'seats'=>$this->input->post('seats'),
            'status'=>$this->input->post('status'),
            'cat'=>$this->input->post('cat'),
          );

        $result = $this->mcrud->updateDataByForm('table_master', $data, array('id' => $whereArr));

        $this->session->set_userdata('success', ' Table has been updated succesfully!');
        redirect("restaurant/tablemaster");
      }

    }        

  }

  public function deleteTableMaster(){
    $wherearr = $_GET['id'];

    $result = $this->mcrud->deleteDataById('table_master', $wherearr, 'id');
    if ($result == true) {
      $this->session->set_userdata('success', ' Table been deleted succesfully!');
      redirect("restaurant/tablemaster");
    }
    $this->session->set_userdata('error', ' Error in deletion!');
    redirect("restaurant/tablemaster");

  }

    public function advanceBooking(){

      $data['tablesData'] = $this->mrestaurant->getRetaurantTableDataActive();
      $data['tablebookings'] = $this->mcrud->getAllDataAscStatusActive('booking_restaurant','id');
      $data['occupiedtbl'] = $this->mrestaurant->getAllDataAscStatusOccupied();
      $data['expiredtbl'] = $this->mrestaurant->getAllDataAscStatusExpired();      
      $this->load->view('includes/header_db');
      $this->load->view('superadmin/navigation');
      $this->load->view('restaurant/advanceBooking',$data);
      $this->load->view('includes/footer_inc_form');          

    }


    public function createAdvanceBooking(){
      $data = array(
        'title'=>$_POST['title'],
        'start'=>$_POST['start'],
        'end'=>$_POST['end'],
        'tbl_no'=>$_POST['tbl_no'],
        'tbl_no_key'=>1,
        'modified_By'=>$_POST['added_by'],
        );
      $result = $this->mcrud->addDataByForm('booking_restaurant',$data);
      if ($result) {
        echo 1;
      }else{
        echo 0;
      }
    }

    public function confirmAdvanceBooking(){
      $id = $_GET['id'];
      $data = array(
        'status'=>'Occupied',
        );
      $result = $this->mcrud->updateDataByForm('booking_restaurant',$data,array('id' => $id));
      if ($result) {
        echo 1;
      }else{
        echo 0;
      }
    }    

    public function deleteAdvanceBooking(){
      $id = $_GET['id'];
      $data = array(
        'status'=>'Deleted',
        );
      $result = $this->mcrud->updateDataByForm('booking_restaurant',$data,array('id' => $id));
      if ($result) {
        echo 1;
      }else{
        echo 0;
      }
    }

    public function setAdbExpiration(){

      $dateFor = $_GET["today"];
      $result = $this->mrestaurant->setAdbExpiration($dateFor);
      if ($result) {
        echo 1;
      }else{
        echo 0;
      }
    }    

}

	
