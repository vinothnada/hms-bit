<?php

class Frontoffice extends CI_Controller{


  public function __construct() {
    parent::__construct();
    $this->load->model('mcrud');
    $this->load->model('msadmin');
    $this->load->model('mbooking');

  }


  public function home(){
    $data["roomsdata"] = $this->msadmin->getRoomMasterData();
    $data['floortypes'] = $this->mcrud->getAllDataAsc('floor_type','id');

    $this->load->view('includes/header_db');
    $this->load->view('superadmin/navigation');
    $this->load->view('frontoffice/home',$data);
    $this->load->view('includes/footer_inc_form');     
  }

  public function newBooking(){

    $data['selectedroomno'] = 0 ;

    if (isset($_GET['id'])) {
      $data['selectedroomno'] = $_GET['id'];
    }

    $data['roomInfo']  = $this->mbooking->getRoomInfo($_GET['id']);
    $data['bookinginfo']  = $this->mcrud->getAllDataDesc('booking_room','booking_no');
    $data["taxservicesdata"] = $this->mcrud->getAllDataDesc('taxservices','modifiedDate');

    $this->load->view('includes/header_db');
    $this->load->view('superadmin/navigation');
    $this->load->view('frontoffice/newBooking',$data);
    $this->load->view('includes/footer_inc_form');        

  }


  public function searchByIdentity(){
    $text = $_GET['searchText'];
    $data["guestsdata"] = $this->mbooking->searchByIdentity($text);
    $this->load->view('frontoffice/searchTable',$data);
  }

  public function searchGuestById(){
    $id = $_GET['gId'];
    $guestdata = $this->mcrud->getDataById('guests',$id,'id');
    echo json_encode($guestdata);

  }

  public function searchByName(){
    $text = $_GET['searchText'];
    $data["guestsdata"] = $this->mbooking->searchByName($text);
    $this->load->view('frontoffice/searchTable',$data);
  }


  public function addNewBooking(){

                  var_dump($this->input->post('chkin_date'));
                  var_dump($this->input->post('chkout_date'));  
                  echo '<br>';

                  $dateTimeString = $this->input->post('chkin_date');

                  $date = date($dateTimeString);

                  echo $date;

                  // $month = substr($dateTimeString, 0,2);
                  // $date = substr($dateTimeString, 3,3);
                  // $year = substr($dateTimeString, 5,8);
                  // echo $month;
                  // echo '<br>';
                  // echo $date;
                  // echo '<br>';
                  // echo $year;


     // $this->form_validation->set_rules('title','title','required');
     // $this->form_validation->set_rules('firstname','firstname','required');
     // $this->form_validation->set_rules('lastname','lastname','required');
     // $this->form_validation->set_rules('identityType','identityType','required');
     // $this->form_validation->set_rules('identityNo','identityNo','required');
     // $this->form_validation->set_rules('gender','gender','required');
     // $this->form_validation->set_rules('address','address','required');
     // $this->form_validation->set_rules('city','city','required');
     // $this->form_validation->set_rules('mobile','mobile','required');
     // $this->form_validation->set_rules('nationality','nationality','required');
     // $this->form_validation->set_rules('chkin_date','chkin_date','required');
     // $this->form_validation->set_rules('chkout_date','chkout_date','required');
     // $this->form_validation->set_rules('tariff','tariff','required');
     // $this->form_validation->set_rules('tax','tax','required');
     // $this->form_validation->set_rules('tariffwithtax','tariffwithtax','required');

     //  $guestData = array(
     //      'title'=>$this->input->post('title'),
     //      'firstname'=>$this->input->post('firstname'),
     //      'lastname'=>$this->input->post('lastname'),
     //      'identityType'=>$this->input->post('identityType'),
     //      'identityNo'=>$this->input->post('identityNo'),
     //      'gender'=>$this->input->post('gender'),
     //      'address'=>$this->input->post('address'),
     //      'city'=>$this->input->post('city'),
     //      'mobile'=>$this->input->post('mobile'),
     //      'nationality'=>$this->input->post('nationality')
     //  );    
      
     //  $currentGuestId = $this->input->post('currentGuest') ;

     //   if ($this->form_validation->run() == FALSE) {
     //    $this->session->set_userdata('error', ' Booking failed!');
     //    redirect("frontoffice/newBooking?id=".$this->input->post('roomno'));
     //  } else {
     //      if ($currentGuestId == "null") {
     //        $currentGuestId = $this->mcrud->addDataByForm('guests',$guestData);
     //      }
     //          $bookingData = array(
     //              'booking_no'=>$this->input->post('bookingno'),
     //              'room_no'=>$this->input->post('roomno'),
     //              'guest_id'=>$currentGuestId,
     //              'chkin_date'=>$this->input->post('chkin_date'),
     //              'chkout_date'=>$this->input->post('chkout_date'),
     //              'modified_By'=>$this->input->post('modified_By')
     //          );

     //        $bookingId = $this->mcrud->addDataByForm('booking_room',$bookingData);

     //          $roomData = array(
     //              'availibility'=>"Occupied",
     //          );

     //        $updatedRoom = $this->mcrud->updateDataByForm('room_master',$roomData,array('roomno' => $this->input->post('roomno')));

     //    $this->session->set_userdata('success', ' Booking has been created succesfully!');
     //    redirect("frontoffice/newBooking?id=".$this->input->post('roomno'));
     //  }  

 }

     private function convertDateFromPucker($dateTimeString){

        $d = split("/", $dateTimeString);
     }


}