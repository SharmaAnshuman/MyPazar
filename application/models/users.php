<?php 
class Users extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function check_auth($user,$pass){
        $query = $this->db->get_where('users', array('username' => '$user', 'password' => '$pass'));
        if($query->num_rows() == 1){
            return $query->result();
        }else{
            return false;
        }
    }

    function get_auth_token(){
        if(isset($_SESSION['userdata']))
            return true;
        else
            return false;
    }

    function add_user(){

    }

    function add_guset_user(){

    }

    function update_user_password(){

    }

    function send_verification_mail(){

    }

    function send_verification_sms(){

    }
}   