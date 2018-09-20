
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
    	$(document).ready(function(){
	    	$("#order_selection").change(function(){
	    		if($("#order_selection").val() == "today_order"){
	    			alert("showing todays order");
	    		}else{
	    			alert("showing "+$("#order_selection").val()+" orders");
	    		}
	    	});
    	})
    </script>

<select id="order_selection">
	<option value="today_order">Today's Orders</option>
	<option value="date_order">Date Orders</option>
</select>

<center>Select Date: <input type="date" name="order_date" class="d-none"></center>
<br/>
<table id="table_id" class="display table table-bordered table-hover table-condensed" style="border: none">
	<thead>
		<tr>
			<th style="font-weight:bold !important; color: #666; background-color: #f5f5f5">order_id</th>
			<th style="font-weight:bold !important; color: #666; background-color: #f5f5f5">mobile</th>
			<th style="font-weight:bold !important; color: #666; background-color: #f5f5f5">amount</th>
			<th style="font-weight:bold !important; color: #666; background-color: #f5f5f5">bill_status</th>
			<th style="font-weight:bold !important; color: #666; background-color: #f5f5f5">delivery_status</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>9747518981</td>
			<td>235.82</td>
			<td>UnPaid</td>
			<td>UnDeliverd<a class="btn btn-sm btn-danger" href="">Delivery</a></td>
		</tr>
		<tr>
			<td>2</td>
			<td>9497717306</td>
			<td>89.25</td>
			<td>UnPaid</td>
			<td>UnDeliverd<a class="btn btn-sm btn-danger" href="">Delivery</a></td>
		</tr>
	</tbody>
</table>
