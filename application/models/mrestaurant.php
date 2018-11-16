<?php

class Mrestaurant extends CI_Model{

    public function getRetaurantTableData(){
        $query = $this->db->get_where('table_master',array('cat'=>'Restaurant'));
        return $query->result();        
    }

    public function getRetaurantTableDataActive(){
    	$this->db->where('cat','Restaurant');
    	$this->db->where('status','Active');
        $query = $this->db->get('table_master');
        return $query->result();        
    }

    public function getBarTableDataActive(){
        $this->db->where('cat','Bar');
        $this->db->where('status','Active');
        $query = $this->db->get('table_master');
        return $query->result();        
    }    

    public function getAllDataAscStatusOccupied(){
        $this->db->where('status','Occupied');
        $query = $this->db->get('booking_restaurant');
        return $query->result();        
    }

    public function getAllDataAscStatusExpired(){
        $this->db->where('status','Expired');
        $query = $this->db->get('booking_restaurant');
        return $query->result();        
    }


    public function setAdbExpiration($dateFor){
        $query = $this->db->query("UPDATE booking_restaurant SET status='Expired' where end < '$dateFor' and status='Active' ");
        return $query;
    }    



} 