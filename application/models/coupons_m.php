<?php 
class Home_m extends CI_Model {

    var $title  = '';
    var $desc = '';
    var $code = '';
    var $store = '';
    var $expDate = '';
    var $stoteUrl = '';
    var $category = '';
    // var $currDate = date();
    var $storeLogoUrl = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getLastTenEntries()
    {
        $query = $this->db->get('coupon', 10);
        return $query->result();
    }

    function searchCoupons($searchToken){
        $qry=$this->db->query("select * from coupon where title='".$searchToken."' or marketplace='".$searchToken."'");
        return $que->num_rows() ? $qry->result() : False;
    }

    function showCoupon($couponID){

        //TODO hide the ID
        
        $qry=$this->db->query("select * from coupon where id='".$couponID."'");
        return $que->num_rows() ? $row->result() : False;
    }

    function upVote($couponId){
        
    }

    function downVote($couponId){
        
    }

}
// <!-- 
//     function insert_entry()
//     {
//         $this->title   = $_POST['title'];
//         $this->desc = $_POST['desc'];
//         $this->code = $_POST['code'];
//         $this->store = $_POST['store'];


//         $this->db->insert('entries', $this);
//     }

//     function update_entry()
//     {
//         $this->title   = $_POST['title'];
//         $this->desc = $_POST['desc'];
//         $this->code = $_POST['code'];
//         $this->date    = time();

//         $this->db->update('entries', $this, array('id' => $_POST['id']));
//     } -->