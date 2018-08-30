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
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('coupon', 10);
        return $query->result();
    }

    function getLoginToken()
    {
        $u = $this->load->post('username');
        $p = $this->load->post('password');
        $this->db->query("select * from userinfo where username = '.$u.' and password = '.$p.' ");
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

// }

// <!-- marketplace   
// -----------
// id name  url        logo        tag
// 1  paytm paytm.com  ./logo.png  paytm

// ecoupons
// -------
// id m_id code views up down exp_date    verify_date public category_name categoty_tag created_date
// 1  1    P12S 23    0  1    12/12/2019  12/12/2018  ture   Fashion       fashion      12/08/2018
// 2  1    DPOK 13    2  1    12/12/2019  12/12/2018  ture   Fashion       fashion      12/08/2018

// select * from ecoupons where created_date -->