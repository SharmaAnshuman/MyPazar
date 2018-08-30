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
class Auth_c extends CI_Controller{
    
    function index(){

        //View
        $data['pageTitle'] = "Login";

        //DB
        $this->load->model('auth_m');
        $data['userTokenInfo'] = $this->auth_m->getLoginToken();

        //View
        if($data['userTokenInfo'])
            $this->session->set_userdata($data['userTokenInfo']);
        else
            $this->load->view('include/navbar');
            $this->load->view('auth_v',$data);
            $this->load->view('include/footer');
    }

}
