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
class Home_c extends CI_Controller{
    

    function index()
    {
    	//PageConfig
    	$data['pageTitle'] = 'Home';

    	$this->load->model('home_m');
    	$data['eCoupons'] = $this->home_m->get_last_ten_entries();
    	// $this->load->view('include/navbar');
        $this->load->view('home_v',$data);
    	// $this->load->view('include/footer');
    }

    function search()
    {
    	//PageConfig
    	$data['pageTitle'] = 'Search';

    	$this->load->model('home_m');
    	// $data['eCoupons'] = $this->home_m->get_last_ten_entries();
    	// $this->load->view('include/navbar');
    	$data['search_token'] =  $this->load->post('search_token');
        $this->load->view('home_v',$data);
    	// $this->load->view('include/footer');
    }
}
