<?php 
class Address extends CI_Model {

    function __construct(){

        parent::__construct();
    }

    function get_user_address(){

    	$query = $this->db->query("select * from address where UID = '".$this->session->userdata("userData")[0]->id."'");
    	$row = $query->result();
    	return "return old AID";

    }

    function set_user_address($uid,$address){

        $query = $this->db->query("insert into address (id,UID,address) values (null,'".$this->session->userdata("userData")[0]->id."','".$address."'");
        $row = $query->result();
        return "return NEW AID";

    }
}   