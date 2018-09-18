<?php
	if($this->session->userdata("desk")){
?>
<div class="m-2" style="display: grid;">
	Payment
	<hr>
	<a href="<?= base_url('/desk/check_payment') ?>">Check Payment Details</a>
	<a href="<?= base_url('/desk/unpaid_bills') ?>">UnPaid Bills</a>
	<a href="<?= base_url('/desk/paid_bills') ?>">Paid Bills</a><br/>

	Order
	<hr>
	<a href="<?= base_url('/desk/get_upcomming_order') ?>">Check Upcomming Order</a>
	<a href="<?= base_url('/desk/get_past_order') ?>">Check Past Order</a><br/>

	Users
	<hr>
	<a href="<?= base_url('/desk/get_user_address') ?>">Get User Address</a><br/>

	Vegetable
	<hr>
	<a href="<?= base_url('/desk/vegetable_add') ?>">Add & Update Vegetable</a>
	<a href="<?= base_url('/desk/vegetable_price') ?>">Vegetable Price</a><br/>
</div>
<?php
	}else{
	?>
		<form action="<?= base_url('desk/system_login') ?>" method="POST" class="form">
			<input type="number" name="desk_token" class="form-control"/><br/>
			<input type="checkbox" name="m_mode" class="form-control">
			<input type="submit" name="btn_desk_login">
		</form>
	<?php	
	}
?>