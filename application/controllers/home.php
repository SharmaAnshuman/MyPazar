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

        // INIT
        // $this->load->model('Users');
        // $result=$this->Users->get_auth_token();
        // if($result){

        //     // Cart
        //     $this->load->model('Order');
        //     $_SESSION['cartCount'] = $this->Order->get_cart_count();

        // }

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

    function add_to_cart(){
        # AJAX add item to cart
        $this->load->model('Order');
        $this->Order->add_to_incart($VID,$qty);
    }

}
