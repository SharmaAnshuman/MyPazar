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

    function update_user_password(){

    }

    function send_verification_mail($email){

    }

    function send_verification_sms(){

    }
}   