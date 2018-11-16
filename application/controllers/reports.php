<?php

class Reports extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model('mcrud');
        $this->load->model('mbar');
    }

	public function exportUsers(){
        $employees = $this->session->userdata('emplist');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('Employee Id','Employee Name','Telephone','Department','Role'));

        $listArray= array();            
        foreach ($employees as $items) {

            $temp = array(
                'Employee Id' => $items->empid,
                'Employee Name'=> $items->name,
                'Telephone'=> $items->tp,
                'Department'=> $items->deptname,
                'Role'=> $items->role_name
            );
            array_push($listArray, $temp);
        }

        if (count($employees)>0) {
            foreach ($listArray as $fields) {
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "Employee List ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('emplist');

	}

    public function exportTaxServices(){
        $sessData = $this->session->userdata('csvdata');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('Category','Type','Value','Updated by','Updated Date'));

        $listArray= array();            
        foreach ($sessData as $items) {

            $temp = array(
                'Category' => $items->name,
                'Type'=> $items->type,
                'Value'=> $items->value,
                'Updated by'=> $items->modifiedBy,
                'Updated Date'=> $items->modifiedDate
            );
            array_push($listArray, $temp);
        }

        if (count($sessData)>0) {
            foreach ($listArray as $fields) {   
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "TaxServices ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('csvdata');

    }

    public function exportRoomtypes(){
        $sessData = $this->session->userdata('csvdata1');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('Roomtype','Tariff','Status'));

        $listArray= array();            
        foreach ($sessData as $items) {

            $temp = array(
                'Roomtype' => $items->type,
                'Tariff'=> $items->tariff,
                'Status'=> $items->status,
            );
            array_push($listArray, $temp);
        }

        if (count($sessData)>0) {
            foreach ($listArray as $fields) {   
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "RoomTypes ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('csvdata1');

    }

    public function exportFloortypes(){
        $sessData = $this->session->userdata('csvdata2');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('FloorName','Building'));

        $listArray= array();            
        foreach ($sessData as $items) {

            $temp = array(
                'FloorName' => $items->type,
                'Building'=> $items->tariff,
            );
            array_push($listArray, $temp);
        }

        if (count($sessData)>0) {
            foreach ($listArray as $fields) {   
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "FloorTypes ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('csvdata2');

    }


    public function exportRoommaster(){
        $sessData = $this->session->userdata('csvdata');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('Room No','Room type','Floor Type','Building','Toilet','Tariff','Status'));

        $listArray= array();            
        foreach ($sessData as $items) {

            $temp = array(
                'Room No' => $items->roomno,
                'Room type'=> $items->type,
                'Floor Type'=> $items->name,
                'Building'=> $items->building,
                'Toilet'=> $items->toilet,
                'Tariff'=> $items->tariff,
                'Status'=> $items->availibility
            );
            array_push($listArray, $temp);
        }

        if (count($sessData)>0) {
            foreach ($listArray as $fields) {   
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "Room_Master ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('csvdata');

    }


    public function exportMenucats(){
        $sessData = $this->session->userdata('csvdata1');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('Catergory','Status'));

        $listArray= array();            
        foreach ($sessData as $items) {

            $temp = array(
                'Catergory' => $items->name,
                'Status'=> $items->status,
            );
            array_push($listArray, $temp);
        }

        if (count($sessData)>0) {
            foreach ($listArray as $fields) {   
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "MenuCategory ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('csvdata1');

    }    


    public function exportMenuunits(){
        $sessData = $this->session->userdata('csvdata2');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('Unit','Status'));

        $listArray= array();            
        foreach ($sessData as $items) {

            $temp = array(
                'Unit' => $items->name,
                'Status'=> $items->status,
            );
            array_push($listArray, $temp);
        }

        if (count($sessData)>0) {
            foreach ($listArray as $fields) {   
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "MenuUnits ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('csvdata2');

    }

    public function exportMenuMaster(){
        $sessData = $this->session->userdata('csvdata');

        $fp = fopen('php://temp', 'w');
        fputcsv($fp, array('Menu','Category','Unit','Rate','Status'));

        $listArray= array();            
        foreach ($sessData as $items) {

            $temp = array(
                'Menu' => $items->itemname,
                'Category'=> $items->mcname,
                'Unit'=> $items->muname,
                'Rate'=> $items->rate,
                'Status'=> $items->status,
            );
            array_push($listArray, $temp);
        }

        if (count($sessData)>0) {
            foreach ($listArray as $fields) {   
                fputcsv($fp, $fields);
            }
        }else{
            fputcsv($fp, array('No Records'));
        }

        $filename = "Menu Master ".date('Y/m/d');

        if ($fp) {
            fseek($fp, 0);
            ob_start('ob_gzhandler');
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment;filename="'.$filename.'.csv";');
            fpassthru($fp);
            exit;
        }
        $this->session->unset_userdata('csvdata');

    }    


}