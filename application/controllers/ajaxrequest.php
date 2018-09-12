<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of download
 *
 * @author Sharma Anshuman
 */
class Ajaxrequest extends CI_Controller{

    function index()
    {
        echo "error";
    }

    function add_to_cart($arr){
        
        # Getting Order Information
        $arr = explode("_",$arr);
        $qtyArr = preg_split('#(?<=\d)(?=[a-z])#i', $arr[1]);
        $VID = $arr[0];
        $qty = $qtyArr[0];
        $qtyMode = $qtyArr[1];

        # Getting Item Price
        $this->load->model('Price');
        $item_prices = $this->Price->get_vegetable_price($VID)[0];


        # Calculate Item Price
        if($qtyMode == "kg"){
            $qty = $qty * 1000;
        }
        if($qty >= 100 && $qty <= 250){
            $price = $item_prices->price250;
            $amount = $price; 
        }else if($qty > 250 && $qty <= 500){
            $price = $item_prices->price500;
            $amount = $price;
        }else if($qty > 999){
            $price = $item_prices->price1000;
            $amount = ($qty / 1000) * $price;
        }
        $discount = "TODO";
        $saved_amount = "TODO";

        # Generate OrderID
        $order_id = $this->session->userdata("order_id");
        $entry_time = $this->session->userdata("entry_time");
        if($entry_time !="" && $order_id == ""){
            $order_id = $entry_time."D".rand(1,9);
            $this->session->set_userdata("order_id",$order_id);
        }

        # Getting User Details Guset/Non-Guset
        $userdata = $this->session->userdata("userData")[0];

        $this->load->model('Order');
        if(isset($userdata->id)){

            $UID = $userdata->id;
            $this->Order->add_to_incart($order_id,$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,'incart',date('d/m/Y h:m:s'));
            return true;

        }else{
            $UID = $this->session->userdata("guset_UID");
            if($UID == ""){
                $UID = "guset_".rand(1000,9999);
                $this->session->set_userdata("guset_UID",$UID);
            }else{
                $UID = $this->session->userdata("guset_UID");
            }
            $token = $this->Order->get_update_token($this->session->userdata("order_id"),$UID,$VID);
            if($token){
                $this->Order->update_to_incart($token[0],$order_id,$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,'incart',date('d/m/Y h:m:s'));
            }else{
                $this->Order->add_to_incart($this->session->userdata("order_id"),$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,'incart',date('d/m/Y h:m:s'));
            }
            return true;
        }
        return false;
    }

    // function add_to_cart($arr){
    //     echo $arr;

    //     // $something = $this->session->userdata('user_enter');
    //     // echo $something['order_id'];
    //     // if(isset($something['order_id'])){
    //     //     $arr = explode("_",$arr);
    //     //     $qtyArr = preg_split('#(?<=\d)(?=[a-z])#i', $arr[1]);
    //     //     $VID = $arr[0];
    //     //     $qty = $qtyArr[0];
    //     //     $qtyMode = $qtyArr[1];
    //     //     $this->load->model('Users');
    //     //     if(!$this->Users->get_auth_token())
    //     //     {

    //     //     }
    //     //     $this->load->model('Order');
    //     //     $this->Order->add_to_incart($order_id,$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,'incart',date('d/m/Y h:m:s'));
    //     // }
    //     // if(isset($this->session->user_enter)){
    //     //     $order_id = $_SESSION['user_enter'];
    //     //     echo $arr;
    //     // }else{
    //     //     echo "not found";
    //     //     echo $this->session->user_enter;
    //     // }
    // }

}
