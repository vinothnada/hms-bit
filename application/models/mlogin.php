<?php

class Mlogin extends CI_Model{

    function loginAuthenticate($uname,$upass){
        $this->db->where('name =',$uname);
        $this->db->where('password =',md5($upass));
        $Query = $this->db->get('employee');
        if ($Query->num_rows()==1){
            return $Query->result();
        }
    }
} 