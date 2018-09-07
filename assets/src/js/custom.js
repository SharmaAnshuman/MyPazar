// $(document).ready(function(){
// 	$("#modeofqty").change(function() {
// 		$("#qty").val("");
// 		if($("#modeofqty").val()=="kg"){
// 			$("#qty").attr({min:1,step:1,max:60});
// 		}else if($("#modeofqty").val()=="gm"){
// 			$("#qty").attr({min:100,step:50,max:1000});
// 		}
// 	});
// 	$("#qty").change(function() {
// 		if($("#modeofqty").val()=="kg" && $("#qty").val() >= 60 )
// 		{
// 			$("#modeofqty").val("kg");
// 			$("#qty").val("60");	
// 		}else if($("#modeofqty").val()=="gm" && $("#qty").val() >= 999 )
// 		{
// 			$("#modeofqty").val("kg");
// 			$("#qty").val("1");	
// 		}
// 	});
// 	$(function() {
// 	    $("#qty").keypress(function(event) {
// 	        if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
// 	            $(".alert").html("Enter only digits!").show().fadeOut(2000);
// 	            return false;
// 	        }
// 	    });
// 	});
// });

// 	$("add_to_cart_form").submit(function(){
//         $.post("<?php echo base_url('/home/add_to_cart'); ?>", { name: "John", time: "2pm" }).done(function( data ) {
// 		    alert( "Data Loaded: " + data );
// 		});
//     });

//   function addToCart(){
//     if($("#cartCount").text() != ""){
//       $("#cartCount").text(parseInt($("#cartCount").text())+1);
//     }
//   }

//   function removeToCart(){
//     if($("#cartCount").text() != "0"){
//       $("#cartCount").text(parseInt($("#cartCount").text())-1);
//     }
//   }

//   $(document).ready(function (event){

//   	// Make GUI better
//     // $('#add_to_cart_model').on('hidden.bs.modal', function (event) {
//     //     var $clone = $("#cartCount").clone();
//     //     $clone.insertAfter('#cartCount');
//     //     var position = $clone.position();
//     //     $clone.css({background:"red",opacity:0.8,left:position.left,top:position.top,height:"auto-10",width:"auto",position:"absolute"})
//     //     $clone.animate({left: screen.width-100,top: "5px"},1200,function(){addToCart();$clone.remove();});
//     // });
    
//     $('#add_to_cart_model').on('show.bs.modal', function (event) {
//       var button = $(event.relatedTarget)
//       var pro_id = button.data('product')
//       var item = "<?php echo $search_item = array_search("+pro_id+", array_column($items, 'id'));?>";
//       alert(item);
//        //"{id:1,name:"Test 1",img:"http://369776-master-d65969.runbot11.odoo.com/web/image/res.company/1/logo?unique=835f34b",price:123};"
//       var modal = $(this)
//         if(item.id==pro_id)
//         {
//           modal.find('#item_title').text(item.name)
//           modal.find('#item_img').attr("src",item.img)
//           modal.find('#item_qty').val(item.price)
//         }
//     });

//   });

// function showModel(id){

// 	$.post("<?php echo base_url('/ajax/product/1') ?>", function(data, status){
//         alert("Data: " + data + "\nStatus: " + status);
//     });

// }