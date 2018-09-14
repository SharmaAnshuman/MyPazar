<?php 
class Address extends CI_Model {

    var $UID = null;
    var $house_name = null;

    function __construct(){

        parent::__construct();
    }

    function get_user_address(){

    	$query = $this->db->query("select * from address where UID = '".$this->session->userdata("userData")[0]->id."'");
    	$row = $query->result();
    	return "return old AID";

    }

    function set_user_address($uid,$address,$current_pos){

        // echo $current_pos;

        $data = array(
            'UID' => $uid ,
            'house_name' => $address,
            'house_no' => $address,
            'road_name' => $address,
            'socity_name' => $address,
            'area_name' => $address,
            'nearby' => $current_pos,
            'is_active'=> 'Y',
            'created_at' => date('dmY h:m:s'),
            'updated_at' => ' ',
         );
        
        $result = $this->db->insert('address', $data);
        if($result){
            return $this->db->insert_id();
        }else{
            return false;
        }

    }
}   