
	
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-12">
				

					<div class="row">
					<?php foreach($eCoupons as $coupon): ?>
						<div class="col-md-4">
							<div class="card text-muted mb-2">
								<div class="card-body bg-white">
									<center><img src='<?php echo base_url("assets/src/img/$coupon->img"); ?>' height="125px" width="125px"/></center>
									<h5 class="card-title "><?= $coupon->name; ?></h5>
									<!-- <h6 class="card-subtitl mb-2"><?= $coupon->qty; ?></h6> -->
									<p class="card-text"><small><?= substr($coupon->info,0,42); ?></small></p>
									<a class="card-link text-primary" data-toggle="modal" data-target="#exampleModal<?= $coupon->id ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
							<!-- Modal -->
									<div class="modal fade" id="exampleModal<?= $coupon->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">eCart</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <table class="table table-bordered">
									        	<tr>
									        		<th>Name</th>
									        		<th>Picture</th>
									        		<th>Qty</th>
									        		<th>Type</th>
									        	</tr>
									        	<tr>
									        		<td><center><img src='<?php echo base_url("assets/src/img/$coupon->img"); ?>' height="55px" width="55px"/></center></td>
									        		<td><small class="card-title "><?= $coupon->name; ?></small></td>
									        		<td>
									        			<input type="number" name="qty" value="1" class="form-control"/>
									        		</td>
									        		<td>
									        			<select class="form-control-sm">
									        				<option>kg</option>
									        				<option>gm</option>
									        			</select>
									        		</td>
									        	</tr>
									        </table>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									        <button type="button" class="btn btn-primary">Add To Cart</button>
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Model -->
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
			</div>

		</div>
	</div>
