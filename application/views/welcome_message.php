<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>" />

    <title>MyPazar</title>
  </head>
  <body class="bg-dark">
    <?php  $this->load->view('include/navbar'); ?>
	
	<div class="container">
		<div class="col-md-4 offset-md-4">
			<div class="input-group e-search-bar mb-4">
				<input type="text" class="form-control" placeholder="Search">
				<div class="input-group-append">
					<button class="btn btn-info fa fa-search" type="button"></button>
				</div>
			</div>
		</div>
	</div>

	<!-- carousel -->
	<div class="container mb-4">
		<div class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
				<img height="350px" class="w-100" src="https://cdn3-offer.paytm.com/wp-content/uploads/2017/09/760x500-8.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
				<img height="350px" class="w-100" src="https://cdn3-offer.paytm.com/wp-content/uploads/2017/02/760x500-1.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
				<img height="350px" class="w-100" src="https://cdn2-offer.paytm.com/wp-content/uploads/2016/12/760X500.jpg" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>


	<div class="container">
		<div class="row">

			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<img src="https:\/\/res.cloudinary.com\/dc4bqmdjz\/image\/upload\/v1513837533\/evidmfpsxgxwlfkpu25m.jpg" class="e-marketplace-logo"/>
					<h5 class="card-title">Paytm</h5>
					<h6 class="card-subtitle mb-2 text-muted">Rs. 300 Off on Minimum Purchase of Rs. 499 (New User)</h6>
					<p class="card-text">Get Rs. 300 off on minimum purchase of Rs. 499. Offer valid for select products displayed on the landing page. Offer valid for new users.</p>
					<a href="#" class="card-link">Show Coupons</a>
					<a href="#" class="card-link"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
					<a href="#" class="card-link"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
				</div>
			</div>

		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?php echo base_url("assets/js/jquery-3.2.1.slim.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>
<!-- <a href="<?=  base_url('next') ?>">Next Page</a> 

{   "id":"1",
	"title":"Rs. 300 Off on Minimum Purchase of Rs. 499 (New User)",
	"description":"Get Rs. 300 off on minimum purchase of Rs. 499. Offer valid for select products displayed on the landing page. Offer valid for new users.",
	"verified_at":"2018-03-14 04:55:45",
	"expires_at":"2018-12-31 18:30:00",
	"coupon_code":"MYNTRANEW300",
	"store_name":"Myntra",
	"store_tag":"myntra",
	"category_name":"Fashion",
	"category_tag":"fashion",
	"store_url":"https:\/\/www.myntra.com\/",
	"store_image":"https:\/\/res.cloudinary.com\/dc4bqmdjz\/image\/upload\/v1513837533\/evidmfpsxgxwlfkpu25m.jpg"}
-->
