<?php if($error){ echo "<span class='alert alert-denger'>$error</span>"; }?>
<form class="p-4" action="myaccount/login" method="POST">
  <div class="form-group">
    <label for="mobile">Mobile Number</label>
    <input type="number" id="mobile" name="username" class="form-control" placeholder="9900099000" value="9722505034">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="ashu">
  </div>
  <button type="submit" class="btn btn-primary" name="btn_signin" value="User Login">Sign in</button>
</form>