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
    	$this->load->model('auth_m');
    	$data['userTokenInfo'] = $this->home_m->getLoginToken();
    	$this->load->view('include/navbar');
        $this->load->view('auth_v',$data);
    	$this->load->view('include/footer');
    }
}
