<?php 
class Vegetable extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function add_vegetable(){

    }

	function get_vegetable(){
        $query = $this->db->query('SELECT * FROM vegetables,price WHERE price.VID = vegetables.id');
        return $query->result();
	}

	function get_vegetable_item($id){
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