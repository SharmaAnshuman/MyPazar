<?php 
class Order extends CI_Model {

	var $UID = "";
	var $VID = "";
	var $qty = "";
	var $qty_amount = "";
	var $created_date = "";
	var $status = "";

    function __construct(){

        parent::__construct();
    }

    function add_to_incart(){
        
        $this->UID = $_POST['UID'];
        $this->VID = $_POST['VID'];
        $this->qty = $_POST['code'];
        $this->qty_amount = $_POST['store'];
        $this->created_date = date(); //check if it done at server side???
        $this->status = "pendding";
        
        $this->db->insert('order', $this);
    }

    function showCart(){
    }

    function update_incart(){

    }

    function remove_incart(){
        
    }

    function get_order_info(){

    }

    function generate_order_id(){

    }

    function place_order(){

    }
}   