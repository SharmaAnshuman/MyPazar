
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<?php foreach($products as $product_item): ?>
						<div class="col-md-4">
							<div class="card text-muted mb-2">
								<div class="card-body bg-white">
									<center><img src='<?php echo base_url("assets/src/img/$product_item->img"); ?>' height="125px" width="125px"/></center>
									<h5 class="card-title "><?= $product_item->name; ?></h5>
									<p class="card-text"><small><?= substr($product_item->info,0,42); ?></small></p>
									<small>250g Rs.20 </small><br/>
									<small>500g Rs.30 40% discount</small><br/>
									<small>1kg  Rs.40 50% discount</small><br/>
									<hr>
									<input type="number" name="">
									<a class="card-link text-primary" data-toggle="modal" data-target="#add_to_cart_model" data-product="<?= $product_item->id ?>" id="btn_add_to_cart">
											<i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart
									</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>