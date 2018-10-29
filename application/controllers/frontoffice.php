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

  public function guestInfo(){
    
  }

}