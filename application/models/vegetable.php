<?php 
class Vegetable extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function getLastTenEntries()
    {
        $query = $this->db->get('vegetable', 10);
        return $query->result();
    }
}   