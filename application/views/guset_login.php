<?php if($error){ echo "<span class='alert alert-denger'>$error</span>"; }?>
<script type="text/javascript">
	$(document).ready(function (){

		$("#mobile").keydown(function (e) {
	        if($("#mobile").val().length < 10){ 
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
		            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 return;
		        }
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }
		    }else{
		    	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
		            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 return;
		        }else{
					e.preventDefault();
		        }
		    }
	    });

	});	 
</script>
<form class="p-4" action="myaccount/guset_login" method="POST">
  <div class="form-group">
  	<label for="name">Full Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
    <label for="mobile">Mobile Number</label>
    <input type="number" id="mobile" name="mobile" class="form-control" placeholder="9900099000" maxlength="10">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    <label for="address">Address</label>
    <textarea id="address" name="address" class="form-control" placeholder="Address"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="btn_signin" value="Guset Login">Sign in as Guset</button>
</form>