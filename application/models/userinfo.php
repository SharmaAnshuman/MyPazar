<?php 
class Userinfo extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function getUserInfo($user, $pass)
    {
        $query = $this->db->query("SELECT * FROM `users` WHERE `username` = '$user' and `password` = '$pass'");

        if($query->result()){
	        $this->session->set_userdata('userData', $query->result());
	        return true;
	    }
	    else{
	    	return false;
	    }
    }

}   