<?php

class Msadmin extends CI_Model{

    public function getMergedData(){
    	$query = $this->db->query('SELECT * from employee,departments,roles where employee.department = departments.deptid and employee.role = roles.role_id');
    	return $query->result();
    }


    public function getRoomMasterData(){
    	$query = $this->db->query('SELECT room_master.id,room_master.roomno,room_master.toilet,room_master.availibility,room_type.type,room_type.tariff,floor_type.name,floor_type.building from room_master,room_type,floor_type where room_master.roomtype = room_type.id and floor_type.id = room_master.floortype');
    	return $query->result();    	
    }

    public function getMenuMasterData(){
    	$query = $this->db->query('SELECT mm.id,mm.itemname,mm.rate,mc.name as mcname,mu.name as muname,mm.status as status from menu_category mc,menu_master mm,menu_unit mu where mm.itemcat=mc.id and mm.itemunit = mu.id and mu.status="Active" and mc.status="Active"');
    	return $query->result();  

    }

} 