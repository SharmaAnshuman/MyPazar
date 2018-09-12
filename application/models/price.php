<?php 
class Price extends CI_Model {

    function __construct(){

        parent::__construct();
    }

    function create_price(){

    }

    function update_price(){

    }

    function get_vegetable_price($id){

    	$query = $this->db->get_where('price', array('VID' => $id));
        return $query->result();
        
    }
}   