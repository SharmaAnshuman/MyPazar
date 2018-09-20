<?php if($error){ echo "<span class='alert alert-denger'>$error</span>"; }?>
<form class="p-4" action="myaccount/forget" method="POST">
  <div class="form-group">
    <label for="mobile">Mobile Number</label>
    <input type="number" id="mobile" name="mobile" class="form-control" placeholder="9900099000" required="">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required="">
  </div>
  <a class="btn btn-primary btn-link" href="<?= base_url('myaccount/forget')?>">Forget Password</button>
</form>