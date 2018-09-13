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

    function guset_order(){

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $pass = $this->input->post('password');
        $address = $this->input->post('address');
        $order_id = $this->session->userdata("order_id");

        $this->load->model('Users');
        $this->load->model('Address');
        $this->load->model('Order');

        $UID = $this->Users->add_guset_user($name,$email,$mobile,$pass);
        if($UID != false)
            $AID = $this->Address->set_user_address($UID, $address);
        if($AID != false)
            if($this->Order->make_order($order_id,$UID)){

                $data['pageTitle'] = "Thank you";
                $data['error'] = "you can get order details using login with mobile number ";

                $this->load->view('include/navbar',$data);
                $this->load->view('thankyou',$data);
                $this->load->view('include/footer',$data);
            }else{
                $data['pageTitle'] = "Opps";
                $data['error'] = "your order is not confim";
                $this->load->view('include/navbar',$data);
                $this->load->view('thankyou',$data);
                $this->load->view('include/footer',$data);
            }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('home');
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

}
