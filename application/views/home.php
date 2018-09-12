
	
	<div class="container-fluid">
		<center><?= $userName ?></center>
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
									<div class="qty_div">
			                          <small>
			                            <span>
			                              <input type="radio" name="qtyMode<?= $product_item->id; ?>" id="qtyMode" onclick="selectQty(this,false)" value="<?= $product_item->id ?>_<?= '100gm'?>">100g</input>
			                              <small id="price"> Rs. <?= $product_item->price250; ?></small>
			                            </span>
			                          </small>
			                          <small>
			                            <span>
			                            	<br/>
			                              <input type="radio" name="qtyMode<?= $product_item->id; ?>" id="qtyMode" onclick="selectQty(this,false)" value="<?= $product_item->id ?>_<?= '250gm'?>">250g</input>
			                              <small id="price"> Rs. <?= $product_item->price250; ?></small>
			                            </span>
			                          </small>
			                          <small>
			                            <span>
			                            	<br/>
			                              <input type="radio" name="qtyMode<?= $product_item->id; ?>" id="qtyMode" onclick="selectQty(this,false)" value="<?= $product_item->id ?>_<?= '500gm'?>">500g</input>
			                              <small id="price"> Rs. <?= $product_item->price500; ?></small>
			                            </span>
			                          </small>
			                          <small>
			                            <span>
			                            	<br/>
			                              <input type="radio" name="qtyMode<?= $product_item->id; ?>" id="qtyMode" onclick="selectQty(this,true)" value="<?= $product_item->id ?>_<?= '1kg'?>">1kg</input>
			                              <small id="price"> Rs. <?= $product_item->price1000; ?></small>
			                            </span>
			                          </small>
			                          <input type="number" placeholder="1 kg" id="qty" class="d-none form-control form-control-sm mt-2">
			                          <br/>
			                          <a class="btn btn-sm card-link text-primary d-none" id="btnAddToCart" onclick="btn_add(this)" data-product="123"><i class="fa fa-shopping-basket fa-4" aria-hidden="true"></i> Add To Cart</a>
			                          <a id="btn_chng" class="d-none btn btn-sm card-link text-primary " onclick="btnQtyChange(this)" ><i class="fa fa-refresh" aria-hidden="true"></i>
Change</a>
			                    <small class="float-right d-none" id="cart"><h4><i class="fa fa-shopping-basket" aria-hidden="true"></i></h4></small>
			                        </div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>