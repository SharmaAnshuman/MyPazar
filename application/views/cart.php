<?php
        if(!$in_cart_items){
        	echo "<center><i class='fa fa-shopping-basket' aria-hidden='true'></i>Your Cart is empty</center>";
        }else{
        $this->session->set_userdata("order_id",$in_cart_items[0]->order_id);
?>
<table class="table" >
	<th>Item</th>
	<th>Qty</th>
	<th>Amount</th>
	<?php $total = 0; ?>
	<!-- <center 	>Order ID: <small><?= $in_cart_items[0]->order_id ?></small></center> -->
	<?php foreach($in_cart_items as $item):?>
		<tr>
			<td><center><img src='<?php echo base_url("assets/src/img/$item->img"); ?>' height="55px" width="55px"/><br/><?= $item->name ?></center></td>
			<?php  if($item->per_item == "Y"){
			?>
				<td><?php if($item->qty_mode == "kg"){echo ($item->qty/1000)." Piece"; } ?></td>
				<td>Rs.<?php echo $item->amount; $total+= $item->amount; ?></td>
			<?php
			}else{
			?>
				<td><?php if($item->qty_mode == "kg"){echo ($item->qty/1000)." ".$item->qty_mode;}else{echo $item->qty." ".$item->qty_mode;} ?></td>
				<td>Rs.<?php echo $item->amount; $total+= $item->amount; ?></td>
			<?php 
			} ?>
		</tr>
	<?php endforeach; ?>
	<tr>
		<td colspan="3">
			<strong class="text-dark float-right mr-4"><i class="fa fa-money fa-4 text-dark" aria-hidden="true"></i> Total Rs.<?= $total ?></strong><br>
			<strong class="text-dark float-right mr-4"><i class="text-dark fa fa-truck fa-4" aria-hidden="true"></i> Delivery Charge Rs.<?php if($total>100){ echo " Free";}else if($total<99){ $total += 10; echo "10"; } ?></strong><br/>
			<strong class="float-right mr-4 text-danger"><i class="fa fa-hourglass-3 fa-4" aria-hidden="true"></i> Grand Total Rs.<?= $total ?></strong>
		</td>
	</tr>
</table>
			<a href="<?php echo base_url('/home/place_order'); ?>" class="btn btn-warning text-white col-10 ml-4 ">Place Order</a>

<?php
	}
?>