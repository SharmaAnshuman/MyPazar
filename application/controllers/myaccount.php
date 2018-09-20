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
        }else{
            //Page
            $data['pageTitle'] = 'Login';
            $data['error'] = $this->error;

            //View
            $this->load->view('include/navbar',$data);
            $this->load->view('auth',$data);
        }

        $this->load->view('include/footer');
    }

    function login(){
        # Get Requested Information
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $btn = $this->input->post('btn_signin');
        if($btn == "User Login"){
            # Vaildation Of Request
            $this->load->model('Users');
            if($user != "" && $pass != ""){
                $result =  $this->Users->check_auth($user,$pass);
                if($result){
                    $this->session->set_userdata("userData",$result);
                    $order_id = $this->session->userdata("order_id");
                    if($order_id){
                        $this->load->model('Order');
                        if($this->Order->update_g2u_order($order_id,$this->session->userdata('guset_UID'),$result[0]->id)){
                            $this->session->unset_userdata("guset_UID");
                            $this->Users->send_verification();
                            redirect(base_url('home/cart'));
                        }else{
                            $this->error = "G2U update error";
                        }
                    }
                }else{
                    $this->error="Please enter all details..";
                }
            }
        }
        redirect(base_url('home'));
    }

    function forget(){
        
        $this->load->model("Users");

        if($this->input->post('btn_forget')){

           $mobile = $this->input->post('mobile');
           $email  = $this->input->post('email');

           if((isset($mobile)) && (isset($email)))
           {
                if($Users->forget_user_password($mobile,$email))
                    $data['error'] = "Password send to your registed mobile number!";
                else
                    $data['error'] = "Your details not found!";
           }
           else
                $data['error'] = "Please enter all details to forget password..";
        }
        else
            $data['error'] = "Enter your registerd mobile and email!";

        $data['pageTitle'] = "Forget";
        $this->load->view('include/navbar',$data);
        $this->load->view('forget',$data);
        $this->load->view('include/footer',$data);

    }

    function order(){

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $pass = $this->input->post('password');
        $address = $this->input->post('address');
        $order_id = $this->session->userdata("order_id");
        $pos = $this->input->post('pos');
        $guset_UID = $this->session->userdata("guset_UID");

        $this->load->model('Users');
        $this->load->model('Address');
        $this->load->model('Order');

        if(isset($name) && isset($mobile) & $guset_UID !=""){

                // Adding guset to user
                $UID = $this->Users->add_guset_user($name,$email,$mobile,$pass);

                if($UID != false){
                    // Getting register guset user data
                    $result = $this->Users->get_userData($UID);
                    if($result){
                        $this->session->set_userdata("userData",$result);
                        if($UID != false)
                            $this->session->unset_userdata("guset_UID");
                            $AID = $this->Address->set_user_address($UID, $address, $pos);
                        if($AID != false)
                            $this->Users->update_address($UID,$AID);
                            if($this->Order->make_order($order_id,$UID)){
                                $this->load->model('Order');
                                $data['pageTitle'] = "Thank you";
                                $data['error'] = "you can get all order details from my account";
                            }else{
                                $data['pageTitle'] = "Opps";
                                $data['error'] = "Opps Your Order Not Confim...";
                            }

                            $this->load->view('include/navbar',$data);
                            $this->load->view('thankyou',$data);
                            $this->load->view('include/footer',$data);
                            
                            $order_id = null;
                            $this->session->unset_userdata("order_id");
                    }
                }
        }else if($this->session->userdata("userData") != ""){
            // registed user found
            if($order_id){
                $user = $this->session->userdata("userData")[0];
                if($this->Order->make_order($order_id,$user->id)){
                    $data['error'] = $user->name." your order has been placed!";
                    $data['pageTitle'] = "Thank you ".$user->name;
                }else{
                    $data['pageTitle'] = "Opps";
                    $data['error'] = "Opps Your Order Not Confim...";
                }

                $this->load->view('include/navbar',$data);
                $this->load->view('thankyou',$data);
                $this->load->view('include/footer',$data);

                $order_id = null;
                $this->session->unset_userdata("order_id");
            }            
        }else{
            redirect(base_url('home'));
        }
        redirect(base_url('home'));
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
