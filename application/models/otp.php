<?php 
class Otp extends CI_Model {

    function __construct(){

        parent::__construct();
    }

    function set_otp(){

        $otp = $this->session->userdata("otp");
        $mobile = $this->session->userdata("mobile");
        if($this->session->userdata("userData")){
            $userdata = $this->session->userdata("userData")[0];
            $UID = $userdata->id;
        }else{
            $UID = $this->session->userdata("guset_UID");
        }

         $data = array(
            'UID' => $UID,
            'otp' => $otp,
            'mobile' => $mobile,
            'status' => 'N',
            'date' => date('d/m/Y h:m:s'),
        );

        if($this->db->insert('otp', $data)){
            return true;
        }else{
            return false;
        }
    }

}   