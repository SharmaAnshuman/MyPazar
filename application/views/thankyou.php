<?php
$total_order_amount = 0;
$this->load->model("Order");
$order_id = $this->session->userdata("order_id");
$order = $this->Order->get_order_info($this->session->userdata("order_id"));
$this->session->unset_userdata("order_id");
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
  <script>
    $(document).ready(function(){

      var node = $("#print")[0];
      domtoimage.toPng(node).then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            var url = img.src.replace(/^data:image\/[^;]+/, 'data:application/octet-stream');
            $("#o_img").attr("href",url);
          $("#o_img")[0].click();
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });


    });
  </script>

      <div id="print" style="background: linear-gradient(127deg, #eb87cdc7,#00ffe575);">
        <table align="center" >
          <tr>
              <th colspan="2">
                <h1><img src="<?php echo base_url("assets/src/img/logo.svg"); ?>" id="brandName" width="35" height="35"> Order <small>Details</small></h1>
                <center><small>Order ID: <strong><?= $order_id ?></strong></small></center>
              </th>
          </tr>
          <tr>
              <td colspan="2"><hr/></td>
          </tr>
          <tr>
              <td  class="text-center" align="center" colspan="2">
              	<div class="m-0">
                  <table class="m-0">
              		<?php foreach ($order as $item): ?>
                    <tr>
  	              	  <td><?= $item->name ?></td>  
                      <td><?= $item->qty."<small>".$item->qty_mode."</small>" ?></td>
                      <td>Rs.<?php $total_order_amount += $item->amount; echo $item->amount;?></td>
                    </tr>
  	              <?php endforeach; ?>
                </table>
	            </div>
              </td>
          </tr>
          <tr>
              <td  align="center"><small>Delivery Status</small></td>
              <td  class="text-center" align="center"><h6 class="m-0"> <small>Order Recevied</small></h6></td>
              
          </tr> 
          <tr>
              <td  align="center"><small>Total Bill:</small></td>
              <td  class="text-center" align="center">
              <?php 
                if($total_order_amount<99){ $total_order_amount += 10;}else if($total_order_amount>100){ }
              ?>
              <h4 class="m-0">Rs.<?= $total_order_amount ?></h4>
          </td>
          </tr>
          <tr>
              <td colspan="2"><hr/>
              <center><small>Order Date: <?= date("d/m/Y h:m:s") ?></small></center>
            </td>
          </tr>
          
        </table>          
      </div>
          <tr>
              <td colspan="2" align="right">
                <h5>
                  <a class="btn btn-link" href="" id="o_img" download="Order_<?= $order_id ?>.png" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></span> <small>Save Recipet</small></a>
                  <a class="btn btn-link float-right" href="<?=  base_url('home') ?>"><small>Goto Home</small></a>
                </h5>
              </td>
          </tr>
          <?php
$order_id = null;
          ?>