<?php

class Mbooking extends CI_Model{


    public function getRoomInfo($id){
    	$query = $this->db->query("SELECT room_master.id,room_master.roomno,room_master.toilet,room_master.availibility,room_type.type,room_type.tariff,floor_type.name,floor_type.building from room_master,room_type,floor_type where room_master.roomtype = room_type.id and floor_type.id = room_master.floortype and room_master.roomno = '$id' ");
    	return $query->result();    	
    }



} 