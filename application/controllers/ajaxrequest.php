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
            $price = $amount;
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
            $token = $this->Order->get_update_token($this->session->userdata("order_id"),$UID,$VID);
            if($token){
                $this->Order->update_to_incart($token[0],$order_id,$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,'incart',date('d/m/Y h:m:s'));
            }else{
                $this->Order->add_to_incart($this->session->userdata("order_id"),$UID,$VID,$qty,$qtyMode,$price,$amount,$discount,$saved_amount,'incart',date('d/m/Y h:m:s'));
            }
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


    var $timeOut = 5; // min
    var $country = 91;
    var $sender = "eSabji";
    var $route = 4;
    var $mobiles = null;
    var $authkey = "demo"; // "237543AXK7PWmNBz5b9b8693"
    var $message = null;
    var $OTP_code = null;

    var $api = null;

    function prepare_otp($mobile){

        $this->load->model("Users");
        $this->load->model("Otp");
        if($this->Users->check_mobile_register($mobile)){
            $this->OTP_code = rand(1023,9999);
            $this->session->set_userdata("otp",$this->OTP_code);
            $this->session->set_userdata("mobile",$mobile);
            if($this->Otp->set_otp()){
                $this->mobiles = $mobile;
                $otpStatus = $this->send_sms_otp($this->OTP_code,$this->session->userdata("mobile"));
                // otp contain error (then show err)
                if($otpStatus)
                {
                    echo 0; // otp headers_sent()
                }
                else
                {
                    echo "x";
                }
            }else{
                echo 2; // otp entry failed
            }

        }else{
            echo 1; // mobile number found
        }
    }

    function sendotp($mobile){
        echo $this->prepare_otp($mobile);
    }

    function confimotp($userOTP){
        if($this->session->userdata("otp") == $userOTP){
            echo 0; // otp confim
            $this->session->unset_userdata("otp");
            $this->session->unset_userdata("mobile");
        }else{
            echo 1; // otp not verified
        }
    }

    function send_sms_otp($otp,$mobile){
            //Your authentication key
            $authKey = "demo"; //"237543AXK7PWmNBz5b9b8693";

            //Multiple mobiles numbers separated by comma
            $mobileNumber = $mobile;

            //Sender ID,While using route4 sender id should be 6 characters long.
            $senderId = "eSabji";

            //Your message to send, Add URL encoding here.
            $message = urlencode("Your verification code is ".$otp."

            Welcome to eSabji Download Our Android App
            http://9m.io/03oD
            ");

            //Define route 
            $route = "4";

            //Prepare you post parameters
            $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route
            );

            //API URL
            $url="http://api.msg91.com/api/sendhttp.php";

            // init the resource
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
            ));


            //Ignore SSL certificate verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


            //get response
            $output = curl_exec($ch);

            //Print error if any
            if(curl_errno($ch))
            {
                return 'error:' . curl_error($ch);
            }

            curl_close($ch);

            return $output;
    }

    function add_vegetable_price($arg,$price_pre_qty){
        $this->load->model('Price');
        $arg = explode("_",$arg);
        echo print($arg);

        if($price_pre_qty == "true"){
            // $VID = $arg[0];
            // $1kg = $arg[1];
            // if($this->Price->add_vegetable($VID,"00","00",$1kg)){
            //         return 1;
            // }
            // else
            // {
            //         return 0;
            // }
        }
        else if($price_pre_qty == "false")
        {
              // $VID = $arg[0];
              // $250g = $arg[1];
              // $500g = $arg[2];
              // $1kg = $arg[3];

              // if($this->Price->add_vegetable($VID,$250g,$500g,$1kg))
              // {
              //       return 1;
              // }
              // else
              // {
              //       return 0;
              // }
        }
    }

}