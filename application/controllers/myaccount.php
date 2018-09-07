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
class Myaccount extends CI_Controller{
    
    public $error = "";

    function index()
    {
        if(isset($_SESSION['userdata'])){
            //Page
            $data['pageTitle'] = 'MyAccount';

            //View
            $this->load->view('include/navbar',$data);
            $this->load->view('myaccount',$data);
            $this->load->view('include/footer');            
        }else{
            //Page
            $data['pageTitle'] = 'Login';
            $data['error'] = $this->error;

            //View
            $this->load->view('include/navbar',$data);
            $this->load->view('auth',$data);
            $this->load->view('include/footer');
        }

    }

    function login(){
        # Get Requested Information
        $user = $this->input->post('user');
        $pass = $this->input->post('user');
        $btn = $this->input->post('btn_signin');
        if($btn != "Guset Login"){
            # Vaildation Of Request
            $this->load->model('Users');
            $result =  $this->Users->check_auth($user,$pass);
            if($result){
                $this->session->set_userdata("userdata",$result);
            }else{
                $this->error="Login Failed...";
            }
            $this->index();
        }else{
            
        }
    }

}
