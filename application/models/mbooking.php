<?php

class Mbooking extends CI_Model{


    public function getRoomInfo($id){
    	$query = $this->db->query("SELECT room_master.id,room_master.roomno,room_master.toilet,room_master.availibility,room_type.id as rtyId,room_type.type,room_type.tariff,floor_type.name,floor_type.building from room_master,room_type,floor_type where room_master.roomtype = room_type.id and floor_type.id = room_master.floortype and room_master.roomno = '$id' ");
    	return $query->result();    	
    }

    public function searchByIdentity($text){
    	$this->db->like('identityNo', $text);
		$query = $this->db->get('guests');
		return $query->result();
    }    

    public function searchByName($text){
    	$this->db->like('firstname', $text);
		$query = $this->db->get('guests');
		return $query->result();
    }

    public function setAdbExpiration($dateFor){
        $query = $this->db->query("UPDATE advance_booking_room SET status='Expired' where end < '$dateFor' and status='Active' ");
        return $query;
    }

    public function getExpiredAdbs() {
        $this->db->order_by("id ASC");
        $query = $this->db->get_where('advance_booking_room',array('status'=>'Expired'));
        return $query->result();
    }

    public function getActiveAdbs() {
        $this->db->order_by("start DESC");
        $query = $this->db->get_where('advance_booking_room',array('status'=>'Active'));
        return $query->result();
    }    

    public function getCurrentOccupiedBookingDetailsOfRoom($roomno){
        $this->db->where("room_no",$roomno);
        $this->db->where("status","in");
        $query = $this->db->get('booking_room');
        return $query->result();
    }

    public function getRoomsOfSameTyeSameStatus($status,$roomtype){
        $query = $this->db->get_where('room_master', array('availibility' => $status,'roomtype' => $roomtype));
        return $query->result();
    }    



} 