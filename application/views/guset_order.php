<style>
  #map {
    height: 230px;
    margin: 5px;
    width: auto;
  }
  .gm-style-iw{
  	color:red;
  }
</style>
<script type="text/javascript">
	$(document).ready(function (){

		$("#otp").hide();

		var mobileNum = false;

		$("#userDetailsForm").submit(function( event ) {
			  if($("#mobile").val().length === 10){
			  	return true;
			  }else{
			  	$("#error").addClass("text-danger h5").text( "Please Enter All Details!" ).focus();
				$(window).scrollTop(0);
			  	event.preventDefault();
			  }
		});


		$("#mobile").keyup(function (e) {
	        if(!($("#mobile").val().length < 10)){ 
	        	e.preventDefault();
	        }
	    });

		$("#mobile").keyup(function (e) {
	        if($("#mobile").val().length < 10){ 
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
		            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 return;
		        }
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }
		        mobileNum = false;
		    }else if(mobileNum == false){
		    	mobileNum = true;
		    	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
		            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 return;
		        }else{
					e.preventDefault();
		        }
			    	process_m(mobileNum);
		    }
	    });

	});	 
	function process_m(mobileNum){
		showProcess(true);
			$.post("<?= base_url("/ajaxrequest/sendotp") ?>/"+$("#mobile").val(), function() {
			}).done(function(data){
				if(data == 0){
					$("#mobile").prop('readonly', true);
					$("#mobile")
						.removeClass("col-12")
						.addClass("col-6");
					$("#otp").show();
					$("#otperror").removeClass('hide').text("OTP sent to your mobile number.");
				}else if(data == 1){
					$("#otperror").removeClass('hide').text("mobile number already registed");
			  		$("#otp").prop('disabled', false);
			  		$("#mobile").prop('readonly', false);
				}
			})
			.fail(function(err) {
			    alert( "error" + err.readyState );
			    alert( "error" + err.responseText );
			    alert( "error" + err.status );
			    alert( "error" + err.statusText );
			 });
			$("#otp").keyup(function() {
				if($("#otp").val().length ==  4){

						  $.post("<?= base_url("/ajaxrequest/confimotp") ?>/"+$("#otp").val(),function(){
						  }).done(function(data1){
						  	$("#otp").prop('disabled', true);
						  	alert(data1);
						  		if(data1 == 0){
						  			$("#otp").hide();
						  			$("#mobile").css("border","2.39062px solid green");
						  			$("#mobile")
						  				.removeClass("col-6")
						  				.addClass("col-12");
						  			$("#otperror").text("your mobile verifed!");
						  		}else{
						  			$("#otperror").text("you have enter wrong OTP");
						  			$("#otp").val("");
						  			$("#otp").prop('disabled', false);
						  		}
						  });
				}
			});
		showProcess(false);
	}
</script>
<?php 
if($error){ echo "<span class='alert alert-denger' id='error'>$error</span>"; }
?>
<p class="ml-4 mb-0">already have account <a href="<?= base_url('myaccount')?>">Login</a></p>
<form class="p-4" action="<?php echo base_url('myaccount/guset_order'); ?>" method="POST" id="userDetailsForm">
  <div class="form-group">
  	<label for="name">Full Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
    <label for="mobile">Mobile Number</label>
    <div class="row m-1">
    <input type="number" id="mobile" name="mobile" class="form-control col-12" placeholder="9900099000" maxlength="10"><input type="number" name="otp" id="otp" placeholder="Enter 4 Digit OTP" class="form-control col-6 hide">
    <small class="hide" id="otperror"></small>
	</div>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    <label for="address">Address</label>
    <textarea id="address" name="address" class="form-control" placeholder="Address"></textarea>
  	<div id="map" class="disabled"></div>
    <input type="hidden" name="pos" id="pos"/>
  </div>
  <button type="submit" class="btn btn-primary" name="btn_signin" value="guset order">Confim Order</button>
</form>

    <script>
      var map, infoWindow;
      function initMap() {
	        map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: 21.6032, lng: 71.2221},
	          zoom: 15,
	          mapTypeId: 'roadmap',
	          gestureHandling: 'none',
	        });

	        infoWindow = new google.maps.InfoWindow;

	        // Try HTML5 geolocation.
	        if (navigator.geolocation) {
	          navigator.geolocation.getCurrentPosition(function(position) {
	            var pos = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            };

	            infoWindow.setPosition(pos);
	            infoWindow.setContent('Get your order here.');

	            infoWindow.open(map);
	            map.setCenter(pos);
	            $("#pos").val(pos.lat + "," + pos.lng);
	            google.maps.event.addListenerOnce(map, 'tilesloaded', fixMyPageOnce);

				function fixMyPageOnce() {
					setTimeout(function() {
					$(".dismissButton").click();
					}, 1000);
				}
	          }, function() {
	            handleLocationError(true, infoWindow, map.getCenter());
	          });
	        } else {
	          // Browser doesn't support Geolocation
	          handleLocationError(false, infoWindow, map.getCenter());
	        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6v5-2uaq_wusHDktM9ILcqIrlPtnZgEk&callback=initMap">
</script>
