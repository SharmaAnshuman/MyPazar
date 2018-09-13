<?php 
class Order extends CI_Model {

    var $order_id = "";
	var $UID = "";
	var $VID = "";
    var $qty = "";
    var $qty_mode = "";
    var $price = "";
    var $amount = "";
    var $discount = "";
    var $saved_amount = "";
    var $status = "";
    var $created_at = "";
    var $updated_at = "";

    function __construct(){

        parent::__construct();
    }

    function add_to_incart($order_id,$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,$status,$created_date){
        
        $this->order_id = $order_id;
        $this->UID = $UID;
        $this->VID = $VID;
        $this->qty = $qty;
        $this->qty_mode = $qtyMode;
        $this->price = $price;
        $this->amount = $amount;
        $this->discount = $discount;
        $this->saved_amount = $saved_amount;
        $this->status = $status;
        $this->created_at = $created_date;
        
        $this->db->insert('myorder', $this);
    }

    function get_mycart(){
        
        $userdata = $this->session->userdata("userData")[0];
        if(isset($userdata->id)){
            $UID = $userdata->id;
        }else{
            $UID = $this->session->userdata("guset_UID");
        }
        $query = $this->db->query("SELECT * FROM `myorder`,`vegetables` WHERE myorder.VID = vegetables.id and myorder.status = 'incart' and myorder.UID = '".$UID."'"); 
        return $query->result();
    }

    function get_update_token($order_id,$UID,$VID){

        $userdata = $this->session->userdata("userData")[0];
        if(isset($userdata->id)){
            $UID = $userdata->id;
        }else{
            $UID = $this->session->userdata("guset_UID");
        }
        $query = $this->db->query("SELECT * FROM `myorder` WHERE VID = '$VID' and order_id = '$order_id' and  UID = '$UID'" ); 
        return $query->result();
    }

    function update_to_incart($update_item,$order_id,$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,$status,$updated_at)
    {
        $this->order_id = $order_id;
        $this->UID = $UID;
        $this->VID = $VID;
        $this->qty = $qty;
        $this->qty_mode = $qtyMode;
        $this->price = $price;
        $this->amount = $amount;
        $this->discount = $discount;
        $this->saved_amount = $saved_amount;
        $this->status = $status;
        $this->created_at = $update_item->created_at;
        $this->updated_at = $updated_at;
        
        $this->db->where("id", $update_item->id); 
        $this->db->update('myorder', $this);

    }

    function make_order($order_id,$UID){
        $data = array(
            'status' => 'Order',
            'updated_at' => date('d/m/Y h:m:s'),
            'UID' => $UID,
        );
        $this->db->where("order_id", $order_id);
        if($this->db->update('myorder', $data)){
            return true;
        }else{
            return false;
        }

    }

    function get_order_info(){

    }

}   