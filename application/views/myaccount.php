<style type="text/css">
	.selected_menu{
	    padding: 17px;
    	font-size: 44px;
    	border: #138496;
    	background-color: #138496;
	}
</style>
<div style="display: grid">
	<!-- <a href="" class="btn btn-sm btn-info mb-2"><i class="fa fa-shopping-basket fa-4" aria-hidden="true"></i> Cart</a> -->
	<a href="<?= base_url('myaccount/order_details') ?>" class="btn btn-sm btn-info mb-2 selected_menu">
		<i class="fa fa-shopping-bag fa-4" aria-hidden="true"></i> Order
	</a>

	<a href="" class="btn btn-sm btn-info mb-2 selected_menu">
		<i class="fa fa-money fa-4" aria-hidden="true"></i> Payment
	</a>
	
	<a href="" class="btn btn-sm btn-info mb-2"><i class="fa fa-wrench fa-4" aria-hidden="true"></i> Setting</a>

	<a href="" class="btn btn-sm btn-info mb-2"><i class="fa fa-money fa-4" aria-hidden="true"></i> Paid</a>
	<a href="" class="btn btn-sm btn-info mb-2"><i class="fa fa-hourglass-3 fa-4" aria-hidden="true"></i> UnPaid Bills</a>

	<a href="" class="btn btn-sm btn-info mb-2"><i class="fa fa-truck fa-4" aria-hidden="true"></i> Delivered</a>
	<a href="" class="btn btn-sm btn-info mb-2"><i class="fa fa-road fa-4" aria-hidden="true"></i> Un-Delivered</a>
	<a href="" class="btn btn-sm btn-info mb-2"><i class="fa fa-newspaper-o fa-4" aria-hidden="true"></i> Bills</a>
</div>