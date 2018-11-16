  <?php

  class PosBar extends CI_Controller{


    public function __construct() {
      parent::__construct();
      $this->load->model('mcrud');
      $this->load->model('msadmin');
      $this->load->model('mrestaurant');
      $this->load->model('mbooking');

    }

    public function index(){

      $data['menumaster'] = $this->msadmin->getMenuMasterData();
      $data['tableData'] = $this->mrestaurant->getBarTableDataActive();


      $this->load->view('includes/header_db');
      $this->load->view('superadmin/navigation');
      $this->load->view('posBar/home',$data);
      $this->load->view('includes/footer_inc_form');  
    }

    public function generatePosTable(){

      $tablenum = $this->input->post('tablenum');
      $item = $this->input->post('item');
      $qty = $this->input->post('qty');
      
      $getItemDetail = $this->mcrud->getDataById('menu_master',$item,'itemname');
      $texData = $this->mcrud->getDataByIdOrder('taxservices','Bar','name','modifiedDate');
      $price = $getItemDetail[0]->rate;
      $tax = $texData[0]->value;

      if ($this->input->post('action') == 'Create') {
        $this->session->set_userdata('index',0);
        $index = $this->session->userdata('index');
        $data[$index]['tablenum'] = $tablenum;
        $data[$index]['item'] = $item;
        $data[$index]['qty'] = $qty;
        $data[$index]['price'] = $price;
        $data[$index]['tax'] = $tax;
        $this->session->set_userdata('dataArray',$data);
      }

      if ($this->input->post('action') == 'Add') {
        $index = $this->session->userdata('index');
        $data = $this->session->userdata('dataArray');        
        $index2 = $index+1;
        $data[$index2]['tablenum'] = $tablenum;
        $data[$index2]['item'] = $item;
        $data[$index2]['qty'] = $qty;
        $data[$index2]['price'] = $price;
        $data[$index2]['tax'] = $tax;
        $this->session->unset_userdata('index');
        $this->session->set_userdata('index',$index2);

        $this->session->unset_userdata('dataArray');
        $this->session->set_userdata('dataArray',$data);
      }
      $main['masterData'] = $data;  
      $this->load->view('posBar/posTable',$main);
    }


   
   public function generatePosInvoice(){
    if ($this->session->userdata('passth')) {    
      $data['masterData'] = $this->session->userdata('dataArray');
      $masterData = $this->session->userdata('dataArray');

      $invData = $this->mcrud->getAllDataDesc('pos_invoices','invno');
      $nextInvId = $invData[0]->invno + 1;
      $data['bookingData'] = $this->mbooking->getInsBookingsWithCustomer();

      for ($i=0; $i < count($masterData); $i++) {

        $tblData = array(
            'invno' =>$nextInvId,
            'item' =>$masterData[$i]['item'],
            'qty' =>$masterData[$i]['qty'],
            'price' =>$masterData[$i]['price']
          ); 
              $result = $this->mcrud->addDataByForm('pos_invoices',$tblData);
      }

      $invData2 = $this->mcrud->getAllDataDesc('pos_invoices','invno');
      $data["invData"] = $this->mcrud->getDataById('pos_invoices',$invData2[0]->invno,'invno');

      $this->load->view('includes/header_db');
      $this->load->view('superadmin/navigation');
      $this->load->view('posBar/posinvoice',$data);
      $this->load->view('includes/footer_inc_form');   
      $this->session->unset_userdata('passth');  
          }else{
      redirect("PosBar/index");
    }     

    }

    public function paidBooking(){
      $inNo = $_GET["invno"];
      $result = $this->mcrud->updateDataByForm('pos_invoices',array("status"=>"Paid","invfrom"=>"Bar"),array("invno"=>$inNo));
      if ($result) {
        echo 1;
      }else{
        echo 0;
      }
    }


    public function linkWithBooking(){
      $inNo = $_GET["invno"];
      $bookNo = $_GET["booking_no"];
      $result = $this->mcrud->updateDataByForm('pos_invoices',array("status"=>"Linked","booking_no"=>$bookNo,"invfrom"=>"Bar"),array("invno"=>$inNo));
      if ($result) {
        echo 1;
      }else{
        echo 0;
      }
    }    


  }
  ?>