<?php

class Sadmin extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('mcrud');
        $this->load->model('msadmin');
    }

	public function index(){
        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('superadmin/index');
        $this->load->view('includes/footer_db');		
	}


	public function getUsers(){

		$data['employees'] = $this->msadmin->getMergedData();
        $data['activeusers'] = $this->mcrud->getRowCountAttr('employee',1,'status');
        $data['allusers'] = $this->mcrud->getRowCountAll('employee');
        $data['emplist'] = $this->mcrud->getAllDataAsc('employee','empid');
        $data['deptlist'] = $this->mcrud->getAllDataAsc('departments','deptid');
        $data['rolelist'] = $this->mcrud->getAllDataAsc('roles','role_id');

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('superadmin/allusers',$data);
        $this->load->view('includes/footer_inc_form');		
	}

    public function addNewuser(){


         $this->form_validation->set_rules('empid','empid','required');
         $this->form_validation->set_rules('name','name','required');
         $this->form_validation->set_rules('tp','tp','required');
         $this->form_validation->set_rules('role','role','required');
         $this->form_validation->set_rules('department','department','required');
         $this->form_validation->set_rules('Status','Status','required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_userdata('error', ' User creation failed!');
            redirect("sadmin/getUsers");
        } else {

        $data = array(
            'empid' => substr($this->input->post('empid'), 2) , 
            'name' => $this->input->post('name') , 
            'tp' => $this->input->post('tp') , 
            'role' => $this->input->post('role') , 
            'department' => $this->input->post('department') , 
            'notes' => $this->input->post('notes') , 
            'Status' => $this->input->post('Status') , 
            'created' => $this->input->post('created') , 
            'password' => md5('123') 
            );

            $result = $this->mcrud->addDataByForm('employee',$data);
            $this->session->set_userdata('success', ' User has been added succesfully!');
            redirect("sadmin/getUsers");
        } 

    }


    public function editUser(){

        if(!$_POST){
        $whereArr = $_GET['id'];
        $data["userInfo"] = $this->mcrud->getDataById('employee', $whereArr, 'empid');
        $data['deptlist'] = $this->mcrud->getAllDataAsc('departments','deptid');
        $data['rolelist'] = $this->mcrud->getAllDataAsc('roles','role_id');                    

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('superadmin/editUser',$data);
        $this->load->view('includes/footer_inc_form');      
        }else{        
         $this->form_validation->set_rules('empid','empid','required');
         $this->form_validation->set_rules('name','name','required');
         $this->form_validation->set_rules('tp','tp','required');
         $this->form_validation->set_rules('role','role','required');
         $this->form_validation->set_rules('department','department','required');
         $this->form_validation->set_rules('Status','Status','required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_userdata('error', ' User updation failed!');
            redirect("sadmin/getUsers");
        } else {

        $data = array(
            'empid' => substr($this->input->post('empid'), 2) , 
            'name' => $this->input->post('name') , 
            'tp' => $this->input->post('tp') , 
            'role' => $this->input->post('role') , 
            'department' => $this->input->post('department') , 
            'notes' => $this->input->post('notes') , 
            'Status' => $this->input->post('Status') , 
            );

            $result = $this->mcrud->updateDataByForm('employee', $data, array('empid' => substr($this->input->post('empid'), 2)));
            $this->session->set_userdata('success', ' User has been updated succesfully!');
            redirect("sadmin/getUsers");
            }

        }
        
    }


    public function deleteUser(){
        $wherearr = $_GET['id'];

        $result = $this->mcrud->deleteDataById('employee', $wherearr, 'empid');
        if ($result == true) {
            $this->session->set_userdata('success', ' user has been deleted succesfully!');
            redirect("sadmin/getUsers");
        }
        $this->session->set_userdata('error', ' Error in deletion!');
        redirect("sadmin/getUsers");
    }


    public function hotelInfo(){

        $data['hinfo'] = $this->mcrud->getAllData('hotel_info');
        $data['deptinfo'] = $this->mcrud->getAllData('departments');

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('superadmin/hotelInfo',$data);
        $this->load->view('includes/footer_inc_form');          
    }

    public function hotelInfoEdit(){

         $this->form_validation->set_rules('name','name','required');
         $this->form_validation->set_rules('slogan','slogan','required');
         $this->form_validation->set_rules('address1','address1','required');
         $this->form_validation->set_rules('address2','address2','required');
         $this->form_validation->set_rules('address3','address3','required');
         $this->form_validation->set_rules('phone','phone','required');
         $this->form_validation->set_rules('email','email','required');
         $this->form_validation->set_rules('fax','fax','required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_userdata('error', ' Hotel Information updation failed!');
            redirect("sadmin/hotelInfo");
        } else {

        $data = array(
                'name'=>$this->input->post('name'),
                'slogan'=>$this->input->post('slogan'),
                'address1'=>$this->input->post('address1'),
                'address2'=>$this->input->post('address2'),
                'address3'=>$this->input->post('address3'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'fax'=>$this->input->post('fax'),
                'mobile'=>$this->input->post('mobile'),
            );

            $result = $this->mcrud->updateDataByForm('hotel_info', $data, array('id' => 1));
            $this->session->set_userdata('success', ' Hotel Information has been updated succesfully!');
            redirect("sadmin/hotelInfo");
            }
                

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('superadmin/hotelInfo',$data);
        $this->load->view('includes/footer_inc_form');          
    }                    



}
