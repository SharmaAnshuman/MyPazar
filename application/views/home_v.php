
    <?php  $this->load->view('include/navbar'); ?>	

    
	
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-3 py-2">
				<?php $this->load->view('include/sidebar'); ?>
			</div>

			<div class="col-md-9">
				 <!-- carousel -->
				  <div class="container-fluid px-0 mb-2">
				    <div class="carousel slide" data-ride="carousel" data-interval="1500">
				      <div class="carousel-inner">
				        <div class="carousel-item active">
				        	 <center><img class=" img-fluid" src="https://cdn3-offer.paytm.com/wp-content/uploads/2017/09/760x500-8.jpg" alt="First slide"></center>
				        </div>
				        <div class="carousel-item">
				        	 <center><img  class=" img-fluid" src="https://cdn3-offer.paytm.com/wp-content/uploads/2017/02/760x500-1.jpg" alt="Second slide"></center>
				        </div>
				        <div class="carousel-item">
				        	<center><img  class=" img-fluid" src="https://cdn2-offer.paytm.com/wp-content/uploads/2016/12/760X500.jpg" alt="Third slide"></center>
				        </div>
				      </div>
				      <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
				        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				        <span class="sr-only">Previous</span>
				      </a>
				      <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
				        <span class="carousel-control-next-icon" aria-hidden="true"></span>
				        <span class="sr-only">Next</span>
				      </a>
				    </div>
				  </div>

				<div class="">
					<div class="row">
					<?php foreach($eCoupons as $coupon): ?>
						<div class="col-md-4">
							<div class="card text-muted mb-2">
								<div class="card-body bg-light">
									<img src='<?php echo $coupon->store_image; ?>' class="e-marketplace-logo float-right" height="35px" width="35px"/>
									<h5 class="card-title "><?= $coupon->store_name; ?></h5>
									<h6 class="card-subtitl mb-2"><?= $coupon->title; ?></h6>
									<p class="card-text"><small><?= substr($coupon->description,0,42).".. <small> Read More</small>"; ?></small></p>
									<a href="<?= $coupon->description; ?>" class="card-link text-primary">Show Coupons</a>
									<a href="#" class="card-link text-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
									<a href="#" class="card-link text-primary"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
			</div>

		</div>
	</div>

 <?php $this->load->view('include/footer'); ?>