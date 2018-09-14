<?php
//echo $error;
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
                <h1>
                  <img src="<?php echo base_url("assets/src/img/logo.svg"); ?>" id="brandName" width="35" height="35">              Order <small>Details</small></h1>
          </tr>
             <!-- <tr>
                 <td ><small style="font-size: 10px">Order ID: 908098ASDA</small></td>
                 <td ><small><h5  style="font-size: 10px;margin-left:180px;margin-bottom: 0px">information</h5></small></td>
          </tr> -->
          <tr>
              <td colspan="2"><hr/></td>
          </tr>
          <tr>
              <td  align="center"><small>Order ID:</small></td>
              <td  class="text-center"  align="right"><h4><?= $this->session->userdata("order_id") ?></h4></td>
          </tr>
          <tr>
              <td  align="center"><small>Total Vegetable:</small></td>
              <td  class="text-center" align="center"><h4>X</h4></td>
          </tr>
          <tr>
              <td  align="center"><i class="fa fa-road fa-4" aria-hidden="true"></i> <small>Delivery Status</small></td>
              <td  class="text-center" align="center"><h5> Un-Delivered</h5></td>
              
          </tr>
          <tr>
              <td  align="center"><small>Amount:</small></td>
              <td  class="text-center" align="center"><h4>Rs.1232</h4></td>
          </tr>
          <tr>
              <td colspan="2"><hr/></td>
          </tr>
          
        </table>          
      </div>
          <tr>
              <td colspan="2" align="right">
                <h5>
                  <a class="btn btn-link" href="" id="o_img" download="Order_<?= $this->session->userdata('order_id'); ?>" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></span> <small>Save Recipet</small></a>
                </h5>
              </td>
          </tr>