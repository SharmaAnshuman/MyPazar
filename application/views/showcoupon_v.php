
    <?php  $this->load->view('include/navbar'); ?>	

    
	
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-3 py-2">
				<?php $this->load->view('include/sidebar'); ?>
			</div>

			<div class="col-md-9">
				<?php if(!isset($error)){?>
				<?php foreach($searchResult as $result);?>
				<?php echo $result->title; ?>
				<?php endforeach; }
				else{
					echo "<h2 class='bg-danger'>".$searchResult."</h2>";
				}?>
			</div>
		</div>
	</div>

		

 <?php $this->load->view('include/footer'); ?>