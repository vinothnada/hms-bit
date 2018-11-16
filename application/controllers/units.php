    <?php

    class Units extends CI_Controller{

      public function __construct() {
        parent::__construct();
        $this->load->model('mcrud');        
        $this->load->model('msadmin');        
      }

      public function types(){
        $data['roomtypes'] = $this->mcrud->getAllDataAsc('room_type','id');
        $data['floortypes'] = $this->mcrud->getAllDataAsc('floor_type','id');

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('units/roomtypes',$data);
        $this->load->view('includes/footer_inc_form');		
      }

      public function addNewRoomtypes(){

       $this->form_validation->set_rules('type','type','required');
       $this->form_validation->set_rules('tariff','tariff','required');
       $this->form_validation->set_rules('status','status','required');
       if ($this->form_validation->run() == FALSE) {
        $this->session->set_userdata('error', ' Room type creation failed!');
        redirect("units/types");
      } else {
        $data = array(
          'type'=>$this->input->post('type'),
          'tariff'=>$this->input->post('tariff'),
          'status'=>$this->input->post('status'),
          'remarks'=>$this->input->post('remarks'),
          );
        $result = $this->mcrud->addDataByForm('room_type',$data);
        $this->session->set_userdata('success', ' Room type has been added succesfully!');
        redirect("units/types");
      }    
    }


    public function editNewRoomtypes(){

      if(!$_POST){
        $whereArr = $_GET['id'];
        $data["roomtypeinfo"] = $this->mcrud->getDataById('room_type', $whereArr, 'id');

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('units/editNewRoomtypes',$data);
        $this->load->view('includes/footer_inc_form');      
      }else{
       $whereArr = $this->input->post('id');    
       $this->form_validation->set_rules('type','type','required');
       $this->form_validation->set_rules('tariff','tariff','required');
       $this->form_validation->set_rules('status','status','required');

       if ($this->form_validation->run() == FALSE) {
        $this->session->set_userdata('error', ' Room type creation failed!');
        redirect("units/types");

      } else {

        $data = array(
          'type'=>$this->input->post('type'),
          'tariff'=>$this->input->post('tariff'),
          'status'=>$this->input->post('status'),
          'remarks'=>$this->input->post('remarks'),
          );

        $result = $this->mcrud->updateDataByForm('room_type', $data, array('id' => $whereArr));

        $this->session->set_userdata('success', ' Room type has been updated succesfully!');
        redirect("units/types");
      }

    }        

  }

  public function deleteNewRoomtypes(){
    $wherearr = $_GET['id'];

    $result = $this->mcrud->deleteDataById('room_type', $wherearr, 'id');
    if ($result == true) {
      $this->session->set_userdata('success', ' Room type been deleted succesfully!');
      redirect("units/types");
    }
    $this->session->set_userdata('error', ' Error in deletion!');
    redirect("units/types");

  }


  public function addFloors(){

   $this->form_validation->set_rules('name','name','required');
   $this->form_validation->set_rules('building','building','required');
   if ($this->form_validation->run() == FALSE) {
    $this->session->set_userdata('error', 'Please fill all fields!');
    redirect("units/types");
  } else {
    $data = array(
      'name'=>$this->input->post('name'),
      'building'=>$this->input->post('building'),
      );
    $result = $this->mcrud->addDataByForm('floor_type',$data);
    $this->session->set_userdata('success', ' Floor has been added succesfully!');
    redirect("units/types");
  }    
}


public function editFloortypes(){

  if(!$_POST){
    $whereArr = $_GET['id'];
    $data["floorinfo"] = $this->mcrud->getDataById('floor_type', $whereArr, 'id');

    $this->load->view('includes/header_db');
    $this->load->view('superadmin/navigation');
    $this->load->view('units/editFloorTypes',$data);
    $this->load->view('includes/footer_inc_form');      
  }else{
   $whereArr = $this->input->post('id');    
   $this->form_validation->set_rules('name','name','required');
   $this->form_validation->set_rules('building','building','required');

   if ($this->form_validation->run() == FALSE) {
    $this->session->set_userdata('error', ' Floor creation failed!');
    redirect("units/types");

  } else {

    $data = array(
      'name'=>$this->input->post('name'),
      'building'=>$this->input->post('building'),
      );

    $result = $this->mcrud->updateDataByForm('floor_type', $data, array('id' => $whereArr));

    $this->session->set_userdata('success', ' Floor has been updated succesfully!');
    redirect("units/types");
  }

}        

}

public function deleteFloortypes(){
  $wherearr = $_GET['id'];

  $result = $this->mcrud->deleteDataById('floor_type', $wherearr, 'id');
  if ($result == true) {
    $this->session->set_userdata('success', ' Floor has been deleted succesfully!');
    redirect("units/types");
  }
  $this->session->set_userdata('error', ' Error in deletion!');
  redirect("units/types");

}


public function roomMaster(){

  $data['roomtypes'] = $this->mcrud->getAllDataAsc('room_type','id');
  $data['roommasterDesc'] = $this->mcrud->getAllDataDesc('room_master','id');
  $data['floortypes'] = $this->mcrud->getAllDataAsc('floor_type','id');
  $data['roommaster'] = $this->msadmin->getRoomMasterData();

  $this->load->view('includes/header_db');
  $this->load->view('superadmin/navigation');
  $this->load->view('units/roommaster',$data);
  $this->load->view('includes/footer_inc_form');    
}

public function addRoom(){

 $this->form_validation->set_rules('roomno','roomno','required');
 $this->form_validation->set_rules('roomtype','roomtype','required');
 $this->form_validation->set_rules('floortype','floortype','required');
 $this->form_validation->set_rules('toilet','toilet','required');
 $this->form_validation->set_rules('availibility','availibility','required');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_userdata('error', ' Room creation failed!');
  redirect("units/roomMaster");
} else {
  $data = array(
    'roomno'=>$this->input->post('roomno'),
    'roomtype'=>$this->input->post('roomtype'),
    'floortype'=>$this->input->post('floortype'),
    'toilet'=>$this->input->post('toilet'),
    'availibility'=>$this->input->post('availibility'),
    );
  $result = $this->mcrud->addDataByForm('room_master',$data);
  $this->session->set_userdata('success', ' Room has been added succesfully!');
  redirect("units/roomMaster");
}    
}


public function editRoom(){

  if(!$_POST){
    $whereArr = $_GET['id'];
    $data["roommaster"] = $this->mcrud->getDataById('room_master', $whereArr, 'id');
    $data['roomtypes'] = $this->mcrud->getAllDataAsc('room_type','id');
    $data['floortypes'] = $this->mcrud->getAllDataAsc('floor_type','id');        


    $this->load->view('includes/header_db');
    $this->load->view('superadmin/navigation');
    $this->load->view('units/editRoom',$data);
    $this->load->view('includes/footer_inc_form');      
  }else{
   $whereArr = $this->input->post('id');    

   $this->form_validation->set_rules('roomno','roomno','required');
   $this->form_validation->set_rules('roomtype','roomtype','required');
   $this->form_validation->set_rules('floortype','floortype','required');
   $this->form_validation->set_rules('toilet','toilet','required');
   $this->form_validation->set_rules('availibility','availibility','required');

   if ($this->form_validation->run() == FALSE) {
    $this->session->set_userdata('error', ' Room updation failed!');
    redirect("units/roomMaster");

  } else {

    $data = array(
      'roomno'=>$this->input->post('roomno'),
      'roomtype'=>$this->input->post('roomtype'),
      'floortype'=>$this->input->post('floortype'),
      'toilet'=>$this->input->post('toilet'),
      'availibility'=>$this->input->post('availibility'),
      );

    $result = $this->mcrud->updateDataByForm('room_master', $data, array('id' => $whereArr));

    $this->session->set_userdata('success', ' Room has been updated succesfully!');
    redirect("units/roomMaster");
  }

}        

}

public function deleteRoom(){
  $wherearr = $_GET['id'];

  $result = $this->mcrud->deleteDataById('room_master', $wherearr, 'id');
  if ($result == true) {
    $this->session->set_userdata('success', ' Room has been deleted succesfully!');
    redirect("units/roomMaster");
  }
  $this->session->set_userdata('error', ' Error in deletion!');
  redirect("units/roomMaster");

}


public function menu(){

  $data['menucats'] = $this->mcrud->getAllDataAsc('menu_category','id');
  $data['menuunits'] = $this->mcrud->getAllDataAsc('menu_unit','id');
  $data['menumaster'] = $this->msadmin->getMenuMasterData();      
  
  $this->load->view('includes/header_db');
  $this->load->view('superadmin/navigation');
  $this->load->view("units/menucatagory",$data);
  $this->load->view('includes/footer_inc_form');

}


public function addMenuCategory(){

 $this->form_validation->set_rules('name','name','required');
 $this->form_validation->set_rules('status','status','required');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_userdata('error', ' Menu Category creation failed!');
  redirect("units/menu");
} else {
  $data = array(
    'name'=>$this->input->post('name'),
    'status'=>$this->input->post('status'),
    );
  $result = $this->mcrud->addDataByForm('menu_category',$data);
  $this->session->set_userdata('success', ' Menu Category has been added succesfully!');
  redirect("units/menu");
}  

}


public function editMenuCategory(){

  if(!$_POST){
    $whereArr = $_GET['id'];
    $data["menucategory"] = $this->mcrud->getDataById('menu_category', $whereArr, 'id');      

    $this->load->view('includes/header_db');
    $this->load->view('superadmin/navigation');
    $this->load->view('units/editMenuCategory',$data);
    $this->load->view('includes/footer_inc_form');      
  }else{
   $whereArr = $this->input->post('id');    

   $this->form_validation->set_rules('name','name','required');
   $this->form_validation->set_rules('status','status','required');

   if ($this->form_validation->run() == FALSE) {
    $this->session->set_userdata('error', ' Menu Category updation failed!');
    redirect("units/menu");

  } else {

    $data = array(
      'name'=>$this->input->post('name'),
      'status'=>$this->input->post('status'),
      );

    $result = $this->mcrud->updateDataByForm('menu_category', $data, array('id' => $whereArr));
    $this->session->set_userdata('success', ' Menu Category has been updated succesfully!');
    redirect("units/menu");
  }

}        

}

public function deleteMenuCategory(){
  $wherearr = $_GET['id'];

  $result = $this->mcrud->deleteDataById('menu_category', $wherearr, 'id');
  if ($result == true) {
    $this->session->set_userdata('success', ' Menu Category has been deleted succesfully!');
    redirect("units/menu");
  }
  $this->session->set_userdata('error', ' Error in deletion!');
  redirect("units/menu");

}           


public function addMenuUnit(){

 $this->form_validation->set_rules('name','name','required');
 $this->form_validation->set_rules('status','status','required');

 if ($this->form_validation->run() == FALSE) {
  $this->session->set_userdata('error', ' Menu Unit creation failed!');
  redirect("units/menu");
} else {
  $data = array(
    'name'=>$this->input->post('name'),
    'status'=>$this->input->post('status'),
    );
  $result = $this->mcrud->addDataByForm('menu_unit',$data);
  $this->session->set_userdata('success', ' Menu Unit has been added succesfully!');
  redirect("units/menu");
}  

}


public function editMenuUnit(){

  if(!$_POST){
    $whereArr = $_GET['id'];
    $data["menuunit"] = $this->mcrud->getDataById('menu_unit', $whereArr, 'id');      

    $this->load->view('includes/header_db');
    $this->load->view('superadmin/navigation');
    $this->load->view('units/editMenuUnit',$data);
    $this->load->view('includes/footer_inc_form');      
  }else{
   $whereArr = $this->input->post('id');    

   $this->form_validation->set_rules('name','name','required');
   $this->form_validation->set_rules('status','status','required');

   if ($this->form_validation->run() == FALSE) {
    $this->session->set_userdata('error', ' Menu Unit updation failed!');
    redirect("units/menu");

  } else {

    $data = array(
      'name'=>$this->input->post('name'),
      'status'=>$this->input->post('status'),
      );

    $result = $this->mcrud->updateDataByForm('menu_unit', $data, array('id' => $whereArr));
    $this->session->set_userdata('success', ' Menu Unit has been updated succesfully!');
    redirect("units/menu");
  }

}        

}

public function deleteMenuUnit(){
  $wherearr = $_GET['id'];

  $result = $this->mcrud->deleteDataById('menu_unit', $wherearr, 'id');
  if ($result == true) {
    $this->session->set_userdata('success', ' Menu Unit has been deleted succesfully!');
    redirect("units/menu");
  }
  $this->session->set_userdata('error', ' Error in deletion!');
  redirect("units/menu");

}


public function menumaster(){

  $data['menucategory'] = $this->mcrud->getAllDataAsc('menu_category','id');
  $data['menucategoryActive'] = $this->mcrud->getAllDataAscStatusActive('menu_category','id');
  $data['menuunit'] = $this->mcrud->getAllDataAsc('menu_unit','id');
  $data['menuunitActive'] = $this->mcrud->getAllDataAscStatusActive('menu_unit','id');
  $data['menumaster'] = $this->msadmin->getMenuMasterData();

  $this->load->view('includes/header_db');
  $this->load->view('superadmin/navigation');
  $this->load->view('units/menumaster',$data);
  $this->load->view('includes/footer_inc_form'); 
}


public function addMenuItem(){

   $this->form_validation->set_rules('itemname','itemname','required');
   $this->form_validation->set_rules('rate','rate','required');
   $this->form_validation->set_rules('itemcat','itemcat','required');
   $this->form_validation->set_rules('itemunit','itemunit','required');
   $this->form_validation->set_rules('status','status','required');

   if ($this->form_validation->run() == FALSE) {
    $this->session->set_userdata('error', ' Menu item creation failed!');
    redirect("units/menumaster");
  } else {
    $data = array(
      'itemname'=>$this->input->post('itemname'),
      'rate'=>$this->input->post('rate'),
      'itemcat'=>$this->input->post('itemcat'),
      'itemunit'=>$this->input->post('itemunit'),
      'status'=>$this->input->post('status'),
      );
    $result = $this->mcrud->addDataByForm('menu_master',$data);
    $this->session->set_userdata('success', ' Menu item has been added succesfully!');
    redirect("units/menumaster");
  }    

}


public function editMenuMaster(){

  if(!$_POST){
    $whereArr = $_GET['id'];
    $data["menumaster"] = $this->mcrud->getDataById('menu_master', $whereArr, 'id');
    $data['menucategory'] = $this->mcrud->getAllDataAscStatusActive('menu_category','id');
    $data['menuunit'] = $this->mcrud->getAllDataAscStatusActive('menu_unit','id');          

    $this->load->view('includes/header_db');
    $this->load->view('superadmin/navigation');
    $this->load->view('units/editMenuMaster',$data);
    $this->load->view('includes/footer_inc_form');      
  }else{
   $whereArr = $this->input->post('id');    

   $this->form_validation->set_rules('itemname','itemname','required');
   $this->form_validation->set_rules('rate','rate','required');
   $this->form_validation->set_rules('itemcat','itemcat','required');
   $this->form_validation->set_rules('itemunit','itemunit','required');
   $this->form_validation->set_rules('status','status','required');

   if ($this->form_validation->run() == FALSE) {
    $this->session->set_userdata('error', ' Menu updation failed!');
    redirect("units/menumaster");

  } else {

    $data = array(
      'itemname'=>$this->input->post('itemname'),
      'rate'=>$this->input->post('rate'),
      'itemcat'=>$this->input->post('itemcat'),
      'itemunit'=>$this->input->post('itemunit'),
      'status'=>$this->input->post('status'),
      );

    $result = $this->mcrud->updateDataByForm('menu_master', $data, array('id' => $whereArr));
    $this->session->set_userdata('success', ' Menu has been updated succesfully!');
    redirect("units/menumaster");
  }

}   

}


public function deleteMenuMaster(){
  $wherearr = $_GET['id'];

  $result = $this->mcrud->deleteDataById('menu_master', $wherearr, 'id');
  if ($result == true) {
    $this->session->set_userdata('success', ' Menu has been deleted succesfully!');
    redirect("units/menumaster");
  }
  $this->session->set_userdata('error', ' Error in deletion!');
  redirect("units/menumaster");

}

}