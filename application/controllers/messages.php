  <?php

  class Messages extends CI_Controller{


    public function __construct() {
      parent::__construct();
      $this->load->model('mcrud');
      $this->load->model('msadmin');
      $this->load->model('mbooking');

    }

    public function getCountsForPages(){
      $usrId = $this->session->userdata('logged_user_id');
      $messages = $this->mcrud->getDataByIdOrder('messages',$usrId,'user_id_to','dateadded');
      $sentmsgs = $this->mcrud->getDataByIdOrder('messages',$usrId,'user_id_from','dateadded');
      $chkouts = $this->mcrud->getDataById('messages','chk','type');      

      $data['countAllNewMessages'] = 0;
      foreach ($messages as $key) {
        if ($key->status == "New") {
          $data['countAllNewMessages'] += 1;
        }
      }

      $data['countSentNewMessages'] = 0;
      foreach ($sentmsgs as $key) {
        if ($key->status == "New") {
          $data['countSentNewMessages'] += 1;
        }
      }

      $data['countCheckouNewMessages'] = 0;
      foreach ($messages as $key) {
        if ($key->status == "Pending") {
          $data['countCheckouNewMessages'] += 1;
        }
      }

      echo json_encode($data);

    }

    public function index(){

      $usrId = $this->session->userdata('logged_user_id');

      $data['messages'] = $this->mcrud->getDataByIdOrder('messages',$usrId,'user_id_to','dateadded');
      $data['sentmsgs'] = $this->mcrud->getDataByIdOrder('messages',$usrId,'user_id_from','dateadded');
      $data['chkouts'] = $this->mcrud->getDataById('messages','chk','type');
      $data['prrequests'] = $this->mcrud->getDataById('messages','pr','type');

      $data['users']= $this->mcrud->getAllDataDesc('employee','empid');

      $this->load->view('includes/header_db');
      $this->load->view('superadmin/navigation');
      $this->load->view('messages/home',$data);
      $this->load->view('includes/footer_inc_form');  
    }


    public function sendMessage(){

      $data = array(
        "user_id_from" => $this->input->post('message-from'),
        "user_id_to" => $this->input->post('message-to'),
        "subject" => $this->input->post('message-subject'),
        "message" => $this->input->post('message-msg'),
        "type" => 'Msg',
        );

      $result = $this->mcrud->addDataByForm('messages', $data);

      if ($result) {
        $this->session->set_userdata('success', ' Message sent');
        redirect(site_url("messages"));
      }

    }


    public function changeStatus(){
      $id = $_GET['id'];
      $data = array('status'=>'Read');
      $result = $this->mcrud->updateDataByForm('messages', $data,array('id'=>$id));
      echo $result;
    }

    public function changetoTrash(){
      $id = $_GET['id'];
      $data = array('status'=>'Trash');
      $result = $this->mcrud->updateDataByForm('messages', $data,array('id'=>$id));
      echo $result;
    }    


    public function changetoDelete(){
      $id = $_GET['id'];
      $data = array('status'=>'Deleted');
      $result = $this->mcrud->updateDataByForm('messages', $data,array('id'=>$id));
      echo $result;
    }

    public function changeCheckout(){
      $id = $_GET['id'];
      $roomno = str_replace("Checkout Alert Room no ", "", $_GET['subject']);
      $data = array('status'=>'Done');
      $result = $this->mcrud->updateDataByForm('messages', $data,array('id'=>$id));

      if ($result) {
        $data2 = array('availibility'=>'Available');
        $changeRoomStatus = $this->mcrud->updateDataByForm('room_master', $data2,array('roomno'=>$roomno));
      }
    }

    public function resetPassword(){
      $username = $_GET['subject'];
      $id = $_GET['id'];
      $data = array('password'=>md5($username));

      $result = $this->mcrud->updateDataByForm('employee',$data,array('name'=>$username));

      if ($result) {
            $data2 = array('status'=>'Done');
            $result2 = $this->mcrud->updateDataByForm('messages', $data2,array('id'=>$id));
            }      
      echo $result;
      
      }  

  }


  ?>