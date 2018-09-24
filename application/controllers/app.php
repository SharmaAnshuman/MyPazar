<?php
/**
 * Description of API for android
 *
 * @author Sharma Anshuman
 */
class App extends CI_Controller{

    function index()
    {
        echo "error";
    }

    function new_user($name,$mobile,$email,$passwd){

        //23092018050944
        $this->load->model('Users');
        $email = str_replace("%40","@",$email);
        $id = $this->Users->add_guset_user($name,$email,$mobile,$passwd);
        if($id != false){
            $user = $this->Users->get_userData($id)[0];
            echo $user->token;
        }else{
            echo "2";
        }
   }

    function get_token($mobile,$password){

    	//return token from record
    }

    function set_token($token){
        $this->load->model('Users');
        $result = $this->Users->app_login($token);
        if($result != false){
            $this->session->set_userdata("userData",$result);
            redirect(base_url('home'));
        }else{
            echo "Error";
        }
    }
}