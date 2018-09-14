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
class System extends CI_Controller{
    
    public $error = "";

    function index()
    {
    	$this->load->view('system');
    	echo "System";

    }

    function add_vegetables(){
    	echo "add vegetable;";
    }
}