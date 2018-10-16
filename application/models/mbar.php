<?php

class Mbar extends CI_Model{

    public function getBarTableData(){
        $query = $this->db->get_where('table_master',array('cat'=>'Bar'));
        return $query->result();        
    }

} 