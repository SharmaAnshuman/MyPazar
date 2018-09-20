<?php 
class Payment extends CI_Model {

    function __construct(){

        parent::__construct();
    }

    function full_payment_details(){
    	$query = $this->db->query("SELECT * FROM `users`,`myorder`,`payment` where users.id = myorder.uid and payment.uid = users.id and myorder.uid = payment.uid");
    	return $query->result();
    }
}   