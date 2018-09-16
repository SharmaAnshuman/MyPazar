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

        # TO BE DONE
        $pos = explode(",",$current_pos) ; //22.258651999999998,71.1923805
        $lat = $pos[0];
        $lng = $pos[1];

        $data = array(
            'UID' => $uid ,
            'address' => $address,
            'lat' => $lat,
            'lng' => $lng,
            'is_active'=> 'Y',
            'created_at' => date('dmY h:m:s'),
            'updated_at' => '',
         );
        
        $result = $this->db->insert('address', $data);
        if($result){
            return $this->db->insert_id();
        }else{
            return false;
        }

    }
}   