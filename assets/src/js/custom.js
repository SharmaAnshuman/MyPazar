
$(document).ready(function(){
	$("#modeofqty").change(function() {
		$("#qty").val("");
		if($("#modeofqty").val()=="kg"){
			$("#qty").attr({min:1,step:1,max:60});
		}else if($("#modeofqty").val()=="gm"){
			$("#qty").attr({min:100,step:50,max:1000});
		}
	});
	$("#qty").change(function() {
		if($("#modeofqty").val()=="kg" && $("#qty").val() >= 60 )
		{
			$("#modeofqty").val("kg");
			$("#qty").val("60");	
		}else if($("#modeofqty").val()=="gm" && $("#qty").val() >= 999 )
		{
			$("#modeofqty").val("kg");
			$("#qty").val("1");	
		}
	});
	$(function() {
	    $("#qty").keypress(function(event) {
	        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
	            $(".alert").html("Enter only digits!").show().fadeOut(2000);
	            return false;
	        }
	    });
	});
});