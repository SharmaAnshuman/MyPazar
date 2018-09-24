<script>

  $(document).ready(function(){

    var $btn_search_mobile = $("#btn_search_mobile");
    var $order_ids = $("#order_ids");
    var $template = $("#template");
    var $client_mobile = $("#client_mobile");

    $btn_search_mobile.click(function () {

      $client_mobile.removeClass("border-danger");
      $btn_search_mobile.removeClass("border-danger");

      if (/^\d{10}$/.test($client_mobile.val())) {
        $.post("<?= base_url('ajaxrequest/get_user_orders') ?>/"+$client_mobile.val(),function (data) {
          $order_ids.html("");
          $order_ids.attr("disabled",false);
          $order_ids.append(data);
        });
      } else {
          $client_mobile.addClass("border-danger");
          $btn_search_mobile.addClass("border-danger");
          $client_mobile.focus();
          return false
      }
    });

    $order_ids.change(function(){      
      if($order_ids.val()!= ""){
        $.post("<?= base_url('ajaxrequest/get_order_details') ?>/"+$order_ids.val(),function(data){
          showProcess(true);
          $template.removeClass("d-none").html("");
          $template.removeClass("d-none").append(data);
          showProcess(false);
        });
      }
    });

  });

</script>

<div>
  <label>Enter Mobile Number</label>
    <div class="input-group">
      <input type="number" name="client_mobile" id="client_mobile" placeholder="Client Mobile" class="form-control"/>
        <div class="input-group-append">
          <button class="btn btn-outline-info text-white" id="btn_search_mobile" type="button">Get Order Details</button>
        </div>
    </div>
    
    <label>Select OrderID</label>
      <div class="input-group">
        <select id="order_ids" class="form-control" disabled="">
          <option value="">Select Order ID</option>
        </select>
      </div>

  <div id="template" class="d-none">
  </div>
</div>