

<?php

class Restaurant extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('mcrud');
        $this->load->model('msadmin');
    }

	public function tablemaster(){
 		$data['tabledata'] = $this->mcrud->getAllDataAsc('table_master','id');

        $this->load->view('includes/header_db');
        $this->load->view('superadmin/navigation');
        $this->load->view('restaurant/tablemaster',$data);
        $this->load->view('includes/footer_db');		
	}
}

	
