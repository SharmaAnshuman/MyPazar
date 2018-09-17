<?php
	if($this->session->userdata("desk")){
?>
	Payment
	<a href="<?= base_url('/desk/check_payment') ?>">Check Payment Details</a>
	<a href="<?= base_url('/desk/unpaid_bills') ?>">UnPaid Bills</a>
	<a href="<?= base_url('/desk/paid_bills') ?>">Paid Bills</a>

	Order
	<a href="<?= base_url('/desk/get_upcomming_order') ?>">Check Upcomming Order</a>
	<a href="<?= base_url('/desk/get_past_order') ?>">Check Past Order</a>

	Users
	<a href="<?= base_url('/desk/get_user_address') ?>">Get User Address</a>

	Vegetable
	<a href="<?= base_url('/desk/vegetable_add') ?>">Add Vegetable</a>
	<a href="<?= base_url('/desk/vegetable_update') ?>">Update Vegetable</a>
	<a href="<?= base_url('/desk/vegetable_price') ?>">Vegetable Price</a>
<?php
	}else{
	?>
		<form action="<?= base_url('desk/desk_login') ?>">
			<input type="number" name="desk_token"/>
			<input type="submit" name="btn_desk_login">
		</form>
	<?php	
	}
?>