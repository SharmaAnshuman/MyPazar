<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link rel="icon" href="<?php echo base_url("assets/src/img/logo.svg"); ?>" sizes="any" type="image/svg+xml">
	<link rel="stylesheet" href="<?php echo base_url("assets/lib/bootstrap/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/lib/font-awesome/css/font-awesome.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/src/css/custom.css"); ?>" />
  <script src="<?php echo base_url("assets/lib/bootstrap/js/jquery.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/src/js/custom.js"); ?>"></script>

    <title><?php echo $pageTitle; ?> :: eSabji ::</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark mb-2">
  <a class="navbar-brand" href="<?php echo base_url(); ?>"  >
      <img src="<?php echo base_url("assets/src/img/logo.png"); ?>" id="brandName" width="35" height="35" class="d-inline-block align-top" alt="eCoupons">
    eSabji
   </a>
   <a class="navbar-brand fixed-brand" href="<?php echo base_url(''); ?>" >
      <img src="<?php echo base_url("assets/src/img/logo.svg"); ?>" width="35" height="35" class="d-inline-block align-top" alt="eCoupons">
   </a>
   <div>
    <?php
      if(!isset($this->session->userdata('userData')[0]->name)){

         ?>
        <a  href="<?php echo base_url('/myaccount'); ?>" class="text-white d-lg-none btn btn-outline-info">
          <span class="fa fa-user"></span>
        </a>
        <?php

      }else{

        ?>
        <a  href="<?php echo base_url('/mysetting'); ?>" class="text-white d-lg-none btn btn-outline-info">
          <span class="fa fa-user"></span>
        </a>
        <?php

      }
    ?>
    <a  href="<?php echo base_url('/home/cart'); ?>" class="text-white d-lg-none btn btn-outline-info">
      <span class="fa fa-shopping-cart"></span>
    </a>
  </div>
  </nav>