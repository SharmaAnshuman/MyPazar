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
        //Page
        $data['pageTitle'] = 'Home';

        //DB
        $this->load->model('coupons_m');
        $data['eCoupons'] = $this->coupons_m->getLastTenEntries();

        //View
        $this->load->view('include/navbar');
        $this->load->view('home_v',$data);
        $this->load->view('include/footer');
    }

    function search()
    {
        //Page
        $data['pageTitle'] = 'Search';
        $data['search_token'] =  $this->load->post('search_token');

        //DB
        $this->load->model('coupons_m');
        $searchResult = $this->coupons_m->searchCoupons($this->load->post('search_token'));
        if($searchResult != False)
            $data['searchResult'] = $searchResult ;
        else
            $data['error'] = " ' <b>".$this->load->post('search_token')."</b> ' related coupon not found";

        //View
        $this->load->view('include/navbar');
        $this->load->view('search_v',$data);
        $this->load->view('include/footer');
    }

    function showCoupon($couponID){

        //DB
        $this->load->model('coupons_m');
        $couponCodeData = $this->coupons_m->showCoupon($couponID);
        if($couponCodeData != False)
            $data['couponCode'] = $couponCodeData;
        else
            $data['error'] = " ' <b>".$couponCodeData."</b> ' related coupon code not found";

        //Page
        $data['pageTitle'] = "Coupon Code";

        //View
        $this->load->view('include/navbar');
        $this->load->view('showcoupon_v',$data);
        $this->load->view('include/footer');

    }
}
