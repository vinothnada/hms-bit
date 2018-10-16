<?php

class Mrestaurant extends CI_Model{

    public function getRetaurantTableData(){
        $query = $this->db->get_where('table_master',array('cat'=>'Restaurant'));
        return $query->result();        
    }

} 