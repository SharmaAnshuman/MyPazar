<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of download
 *
 * @author KnowCode
 */
class download extends CI_Controller{
    
    function index()
    {
           $this->load->view('download_view');
    }
}
