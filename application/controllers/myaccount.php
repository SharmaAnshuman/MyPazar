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
                    redirect(base_url('home'));
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
        redirect(base_url('home'));
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

        $UID = $this->session->userdata("guset_UID");
        if($UID != ""){
            // Adding guset to user
            $UID = $this->Users->add_guset_user($name,$email,$mobile,$pass);
            if($UID != false){
                // Getting register guset user data
                $result = $this->Users->get_userData($UID);
                if($result){
                    $this->session->set_userdata("userData",$result);
                    if($UID != false)
                        $this->session->unset_userdata("guset_UID");
                        $AID = $this->Address->set_user_address($UID, $address);
                    if($AID != false)
                        if($this->Order->make_order($order_id,$UID)){
                            $data['pageTitle'] = "Thank you";
                            $data['error'] = "you can get all order details from my account";
                            $this->load->view('include/navbar',$data);
                            $this->load->view('thankyou',$data);
                            $this->load->view('include/footer',$data);
                        }else{
                            $data['pageTitle'] = "Opps";
                            $data['error'] = "Opps Your Order Not Confim...";
                            $this->load->view('include/navbar',$data);
                            $this->load->view('thankyou',$data);
                            $this->load->view('include/footer',$data);
                        }
                        $order_id = null;
                        $this->session->unset_userdata("order_id");
                }
            }
        }
        else if($this->session->userdata("userData") != ""){
            // registed user found
            $order_id = $this->session->userdata("order_id");
            if($order_id){
                
            }
            echo "for registed users : you can back after time";
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('home'));
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

    function orders(){

        $this->load->model('Myorder');
        $result = $this->Myorder->get_order_info();

        $data['pageTitle'] = "Thank you";
        $data['orders'] = $result;
        $this->load->view('include/navbar',$data);
        $this->load->view('order',$data);
        $this->load->view('include/footer',$data);
    }

}
