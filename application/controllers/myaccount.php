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
        if(isset($this->session->userdata('userData')[0]->name)){
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
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $btn = $this->input->post('btn_signin');
        if($btn != "Guset Login"){
            # Vaildation Of Request
            $this->load->model('Users');
            if($user != "" && $pass != ""){
                $result =  $this->Users->check_auth($user,$pass);
                if($result){
                    $this->session->set_userdata("userData",$result);
                    redirect('home');
                }else{
                    $this->error="Login Failed...";
                }
            }
        }else{

            //Page
            $data['pageTitle'] = 'Guset Login';
            $data['error'] = $this->error;

            //View
            $this->load->view('include/navbar',$data);
            $this->load->view('guset_login',$data);
            $this->load->view('include/footer');   

        }
        //redirect('home');
    }

    function guset_login(){

        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile`');
        $pass = $this->input->post('password');
        $address = $this->input->post('address');

        
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }

}
