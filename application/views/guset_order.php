<style>
  #map {
    height: 500px;
    margin: 10px;
    width: auto;
  }
</style>
<?php 
if($error){ echo "<span class='alert alert-denger'>$error</span>"; }

?>
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
<form class="p-4" action="<?php echo base_url('myaccount/guset_order'); ?>" method="POST">
  <div class="form-group">
  	<label for="name">Full Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
    <label for="mobile">Mobile Number</label>
    <input type="number" id="mobile" name="mobile" class="form-control" placeholder="9900099000" maxlength="10">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    <label for="address">Address</label>
    <textarea id="address" name="address" class="form-control" placeholder="Address"></textarea>
    <input type="hidden="hidden"" name="pos" id="pos"/>
  </div>
  <button type="submit" class="btn btn-primary" name="btn_signin" value="guset order">Confim Order</button>
  <div id="map" class="disabled"></div>
</form>

    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
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
	            // $.post("https://www.ashusharma.com/",{"pos":pos},function (data){
	            //  alert(data); 
	            // });
	            
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