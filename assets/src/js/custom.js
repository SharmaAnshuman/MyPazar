      $( window ).on( "load", function() {
          if(is_mobile()){
          }else{
            $("body").remove();
          }
      });

      function is_mobile() { 
         if( navigator.userAgent.match(/Android/i)
         || navigator.userAgent.match(/webOS/i)
         || navigator.userAgent.match(/iPhone/i)
         || navigator.userAgent.match(/iPad/i)
         || navigator.userAgent.match(/iPod/i)
         || navigator.userAgent.match(/BlackBerry/i)
         || navigator.userAgent.match(/Windows Phone/i)
         ){
            return true;
          }
         else {
            return false;
          }
      }


    // function btnAddToCart(self){
    //   $.post('/t.txt',function(data){
    //     alert(data);
    //   });
    // }

    function selectQty(self,token){
      if(token){
        $(self.parentElement).parent().parent().find("#qty").removeClass("d-none");
      }
      $(self).parent().parent().parent().find('input[type="radio"]:not(:checked)').parent().addClass("d-none");
      // $('input[type="radio"]:not(:checked)').addClass("d-none");
      $(self).parent().parent().parent().find("#btn_chng").removeClass("d-none");
      $(self).parent().parent().parent().find("#btnAddToCart").removeClass("d-none");
    }

      function btnQtyChange(self){
        $(self.parentElement).find("#qty").addClass("d-none");
        $(self.parentElement).find('input[type="radio"]:not(:checked)').parent().removeClass("d-none");
        $(self.parentElement).find("#btnAddToCart").removeClass("disabled");
        $(self.parentElement).find("#btnAddToCart").text("Add To Cart");

      }

      function btn_add(self){
        if(is_mobile()){
          $(self).addClass("disabled");
          $currentTarget = $(self);
          var pro_id = $currentTarget.data('product');
          var $clone = $($currentTarget.parent().parent().find("img")).clone();
          $clone.insertAfter($currentTarget.parent().parent().find("img"));
          var position = $clone.position();
          $clone.css({opacity:0.8,position:"absolute"})
          $clone.offset({left:$clone.offset().left-20})
          var $cart = $($currentTarget.parent().parent().find("#cart"));
          $cart.removeClass("d-none");
          $clone.animate({bottom:"20px",left:screen.width-70,opacity:0.1,height:"20px",width:"30px"},1200,function(){
            $clone.remove();
          });
          $currentTarget.text("Adding to Cart..");
          $cart.animate({opacity:0.9},1200,function(){
            $cart.addClass("d-none");
          });
          $(self).parent().find("#qty").addClass("d-none");
          var key = $(self.parentElement).parent().find("input[type='radio']:checked").val();
          if($(self).parent().find("#qty").val()){
            key = key.split("_")[0]+"_"+$(self).parent().find("#qty").val()+"kg";
           }
          $.post(window.location.origin+'/ajaxrequest/add_to_cart/'+key,function(data){
              $currentTarget.text("Added");
          }).fail(function(err) {
              alert("Item not added to cart due to internal error");
          });
        }
      }

      // function addQty(self,opertion){
      //   var $btn = $(self);
      //   var $qty = $btn.parent().find("#qty");
      //   if($btn.text() == "+" && opertion == "+"){
      //     if(parseInt($qty.val()) > 0)
      //     $qty.val(parseInt($qty.val())+50)
      //   }else if($btn.text() == "+" && opertion == "+"){
      //     // if(parseInt($qty.val()) > 0)
      //     $qty.val(parseInt($qty.val())-50)
      //   }
      // }


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