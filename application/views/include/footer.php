
	<div>
	</div>
	<?php if($this->session->userdata("desk")){?>
	<center><a href="<?php echo base_url("/desk/system_logout")?>">Logout..</a></center>
	<?php }else{ ?>
	<center><a href="<?php echo base_url("/myaccount/logout")?>">Logout</a></center>
	<?php } ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?php echo base_url("assets/lib/bootstrap/js/popper.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/lib/bootstrap/js/bootstrap.min.js"); ?>"></script>
  </body>
</html>