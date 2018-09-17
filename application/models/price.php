<?php 
class Price extends CI_Model {

    function __construct(){

        parent::__construct();
    }

    function vegetable($VID,$g250,$g500,$kg1){

        $data = array(
            'price250' => $g250, 
            'price500' => $g500, 
            'price1000' => $kg1, 
        );
        
        $this->db->where("VID", $VID); 
        if($this->db->update('price', $data)){
            return true;
        }else{
            return false;
        }

    }

    function get_vegetable_price($id){

    	$query = $this->db->get_where('price', array('VID' => $id));
        return $query->result();
        
    }
}   