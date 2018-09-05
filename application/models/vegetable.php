<?php 
class Vegetable extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function add_vegetable(){

    }

	function get_vegetable(){
        $query = $this->db->get('vegetable');
        return $query->result();
	}

	function update_vegetable(){

	}

	function delete_vegetable(){

	}

	function upload_vegetable_img(){

	}
}   