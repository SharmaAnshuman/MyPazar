<?php if($error){ echo "<span class='alert alert-denger'>$error</span>"; }?>
<form class="p-4" action="myaccount/login" method="POST">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="text" id="email" name="username" class="form-control" placeholder="email@example.com">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="rememberCheck">
    <label class="form-check-label" for="rememberCheck">
      Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary" name="btn_signin" value="User Login">Sign in</button>
  <button type="submit" class="btn btn-primary" name="btn_signin" value="Guset Login">Sign in as Guset</button>
</form>