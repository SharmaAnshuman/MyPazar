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
class Desk extends CI_Controller{
    
    public $error = "";

    function index(){

        // Page
        $data['pageTitle'] = 'Desk';
        
        // View
        $this->load->view('include/navbar',$data);
        $this->load->view('desk',$data);
        $this->load->view('include/footer',$data);
    }

    function system_login(){
        $system_token = $this->load->input("desk_token");
        if($system_token == "9722505034"){
            $this->session->set_userdata("desk",true);
            redirect(base_url('desk'));
        }
    }

    //  V E G E T A B L E S
    function vegetables_add(){
    	echo "add vegetable;";
    }

	function vegetable_update(){
		echo "update vegetable;";
	}

    function vegetable_price(){
    	// DB
        $this->load->model('Vegetable');
        $data['vegetables'] = $this->Vegetable->get_vegetable();

        // Page
        $data['pageTitle'] = 'Vegetable Price';
        
        // View
        $this->load->view('include/navbar',$data);
        $this->load->view('system/vegetable_price',$data);
        $this->load->view('include/footer',$data);
    }

    //  O R D E R
	function get_past_order(){
		echo "past order;";
	}

	function get_upcomming_order(){
		echo "get_upcomming_order";
	}


	//  U S E R S
    function get_user_address(){
    	echo "user address";
    }


    //  P A Y M E N T
    function check_payment(){
		echo "Check payment";
    }

    function paid_bills(){
		echo "paid bills";
    }

    function unpaid_bills(){
		echo "unpaid bills";
    }
}