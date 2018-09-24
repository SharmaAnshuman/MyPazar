<?php 
class Users extends CI_Model {

    var $username = null;
    var $password = null;
    var $name = null;
    var $email = null;
    var $mobile = null;
    var $type = null;
    var $verified = "N";
    var $AID = 0;
    var $token = "";

    function __construct()
    {
        parent::__construct();
    }

    function check_auth($user,$pass){
        if($user != "" && $pass != "")
        {
            $query = $this->db->query("select * from users where `username` = '$user' and `password` = '$pass'");
            if($query->num_rows() == 1){
                return $query->result();
            }else{
                return false;
            }
        }
        return false;
    }

    function get_userData($UID){

        if($UID != "")
        {
            $query = $this->db->query("select * from users where  `id` = '$UID'");
            if($query->num_rows() == 1){
                return $query->result();
            }else{
                return false;
            }
        }
        return false;

    }

    function get_auth_token(){
        if(isset($_SESSION['userID']))
            return true;
        else
            return false;
    }

    function add_guset_user($name,$email,$mobile,$pass){

        $this->name = $name;
        $this->password = $pass;
        $this->type = "Guset";
        $this->email = $email;
        $this->mobile = $mobile;
        $this->username = $mobile;
        $this->token = $this->generateRandomString(5);


        $result = $this->db->insert('users', $this);
        if($result){
            $id = $this->db->insert_id();
            $query = $this->db->query("select * from users where `id` = '$id' ");
            $this->session->set_userdata("userData",$query->result());
            return $id;
        }else{
            return false;
        }
    }

    function update_address($UID,$AID){

        $data = array(
            'AID' => $AID,
        );
        $this->db->where("id", $UID);
        if($this->db->update('users', $data)){
            return true;
        }else{
            return false;
        }
    }

    function check_mobile_register($mobile){

        if($mobile != "")
        {
            $query = $this->db->query("select * from users where  `mobile` = '$mobile'");
            if($query->num_rows() == 1){
                return false; // already register mobile
            }else{
                return true; // new mobile num
            }
        }
        return false;

    }

    function forget_user_password($mobile,$email){

        if($mobile != "")
        {
            $query = $this->db->query("select * from users where  `mobile` = '$mobile' and `email` = '$email' ");
            if($query->num_rows() == 1){
                return false; // already register mobile
            }else{
                return true; // new mobile num
            }
        }
        return false;

    }

    function send_verification($type="EMAIL"){

        $UID = $this->session->userdata("userData")[0]->id;
        $query = $this->db->query("select * from `users` where `id`= $UID");

        if($type == "EMAIL"){
            $email = $query->result()[0]->email;

        }else if($type == "SMS"){
            $mobile = $query->result()[0]->mobile;
        }

    }

    function generateRandomString($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function app_login($token){

        if($token != "")
        {
            $query = $this->db->query("select * from users where  `token` = '$token'");
            if($query->num_rows() == 1){
                return $query->result();
            }else{
                return false;
            }
        }
        return false;
    }
}   