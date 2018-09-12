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
class Home extends CI_Controller{

    function index()
    {   
        $entry_time = $this->session->userdata("entry_time");
        if($entry_time==""){
            $now = DateTime::createFromFormat('U.u', microtime(true));
            $entry_time = $now->format('dmyhms');
            $this->session->set_userdata('entry_time', $entry_time);
        }

        $userData = $this->session->userdata('userData')[0];
        if (isset($userData->name)) {
            $data['userName'] = "Welcome ".$userData->name;
        }else{
            $data['userName'] = "Hello Guset!";
        }

        // DB
        $this->load->model('Vegetable');
        $data['products'] = $this->Vegetable->get_vegetable();

        // Page
        $data['pageTitle'] = 'Home';
        
        // View
        $this->load->view('include/navbar',$data);
        $this->load->view('home',$data);
        $this->load->view('include/footer',$data);
    }

    function cart(){
        $this->load->model('Order');
        $data['in_cart_items'] = $this->Order->get_mycart();

        // Page
        $data['pageTitle'] = 'Cart';
        
        // View
        $this->load->view('include/navbar',$data);
        $this->load->view('cart',$data);
        $this->load->view('include/footer',$data);
    }

    function place_order(){
        
        $this->load->model("Order");
        $this->load->model("Users");
        $this->load->model("Address");

        $order_id = $this->session->userdata("order_id");
        $result = $this->Order->get_mycart();
        
        if(!empty($result)){
            if (strpos($result[0]->UID, "guset_") !== false) {

                $data['pageTitle'] = "Address";
                $data['order_id'] = $order_id;
                $data['error'] = "Please provide us where to deliver order.";

                $this->load->view('include/navbar',$data);
                $this->load->view('guset_order',$data);
                $this->load->view('include/footer',$data);


            }else{
                $userData = $this->session->userdata('userData')[0];
                if (isset($userData->name)) {
                    $this->Order->make_order($order_id);
                }else{
                    echo "Please login..";
                }
            }
        }else{

            echo "404 ERROR";

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
}
