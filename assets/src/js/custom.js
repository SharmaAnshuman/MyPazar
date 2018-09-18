
//Force browers to stop in desktop
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

// removing body if loaded on pc
  $( window ).on( "load", function() {
      if(is_mobile()){
      }else{
        $("body").remove();
      }
  });

// User Select Any of one QTY
    function selectQty(self,token){
      if(token){
        $(self.parentElement).parent().parent().find("#qty").removeClass("d-none");
      }
      $(self).parent().parent().parent().find('input[type="radio"]:not(:checked)').parent().addClass("d-none");
      $(self).parent().parent().parent().find("#btn_chng").removeClass("d-none");
      $(self).parent().parent().parent().find("#btnAddToCart").removeClass("d-none");
    }

// If user want to change QTY
      function btnQtyChange(self){
        $(self.parentElement).find("#qty").addClass("d-none");
        $(self.parentElement).find('input[type="radio"]:not(:checked)').parent().removeClass("d-none");
        $(self.parentElement).find("#btnAddToCart").removeClass("disabled");
        $(self.parentElement).find("#btnAddToCart").text("Add To Cart");

      }

// Adding Item to Cart
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

// Showing Proccess On Screen
function showProcess(token,msg="Please Wait.."){
    if(token){
      $("#process_window").removeClass("d-none").addClass("process_window");
      $("#process_content").addClass("process_content").html(msg);
    }else{
        $("#process_content").html(msg);
        setInterval(function(){ $("#process_window").removeClass("process_window").addClass("d-none"); }, 3000);
    }
}