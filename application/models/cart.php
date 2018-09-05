<?php 
class Cart extends CI_Model {

	var $UID = "";
	var $VID = "";
	var $qty = "";
	var $qty_amount = "";
	var $created_date = "";
	var $status = "";

    function __construct()
    {
        parent::__construct();
    }

    function addToCart()
    {
        $this->UID   = $_POST['title'];
        $this->VID = $_POST['desc'];
        $this->qty = $_POST['code'];
        $this->qty_amount = $_POST['store'];
        $this->created_date = now();
        $this->status = "pandding";
        
        $this->db->insert('cart', $this);
    }
}   