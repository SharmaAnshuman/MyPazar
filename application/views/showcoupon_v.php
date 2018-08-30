  
	
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-3 py-2">
				<?php $this->load->view('include/sidebar'); ?>
			</div>

			<div class="col-md-9">
				<?php if(!isset($error)){?>
				<?php foreach($couponCode as $result):?>
				<?php echo $result->title; ?>
				<?php echo $result->coupon_code; ?>
				<?php echo $result->store_name; ?>
				<?php endforeach; }
				else{
					echo "<h2 class='bg-danger'>".$error."</h2>";
				}?>
			</div>
		</div>
	</div>

		

 <?php $this->load->view('include/footer'); ?>