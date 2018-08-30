<?php

class Auth_m extends CI_Model {

    var $token  = '';
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getLoginToken()
    {
        $u = $this->load->post('username');
        $p = $this->load->post('password');
        $toBeToken = $this->db->query("select * from userinfo where username = '.$u.' and password = '.$p.' ");
        return $toBeToken->num_rows() ? $toBeToken->result(); : False;
    }