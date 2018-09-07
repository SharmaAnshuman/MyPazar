<?php 
class Vegetable extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function add_vegetable(){

    }

	function get_vegetable(){
        $query = $this->db->get('vegetables');
        return $query->result();
	}

	function get_vegetable_with_id($id){
		$query = $this->db->get_where('vegetables', array('id' => $id));
        return $query->result();
	}

	function update_vegetable(){

	}

	function delete_vegetable(){

	}

	function upload_vegetable_img(){

	}
}   