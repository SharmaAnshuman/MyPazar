<script>
  $(document).ready(function(){
    $("#btn_add_price").click(function(){
      showProcess(true);
      $rows = $('table').get(0).rows;
      // Skiping 0th row because it is table-header
      for(i=1;i<$rows.length-1;i++){
        $currentRowCells = $rows[i].cells;
        if($currentRowCells[4].firstChild.checked){
          // qty in per item price
          $VID = $currentRowCells[0].firstChild.id;
          $per_item_price = $currentRowCells[3].firstChild.value;
          $arg = $VID+"_"+$per_item_price;
          $.post("<?= base_url('/ajaxrequest/add_vegetable_price/') ?>"+$arg+"/true",function(){

          }).done(function(){

          });
        }else{
          // qty in g
          $VID = $currentRowCells[0].firstChild.id;
          $250g = $currentRowCells[1].firstChild.value;
          $500g = $currentRowCells[2].firstChild.value;
          $1kg = $currentRowCells[3].firstChild.value;
          $arg = $VID+"_"+$250g+"_"+$500g+"_"+$1kg;
          $.post("<?= base_url('/ajaxrequest/add_vegetable_price/') ?>"+$arg+"/false",function(){

          }).done(function(){

          });
        }
      }
      showProcess(false);
    });
  });

  function chng_qty_mode(self){
    $self = $(self);
    $parent = $self.parent().parent();
    if($self[0].checked){
      $parent.find("#250g,#500g").val("00").attr("disabled",true);
      $item_price = $self.parent().parent().find("#1kg");
      $item_price.attr("placeholder","Per Item");
    }else{
      $parent = $self.parent().parent();
      $qty_prices = $parent.find("#250g,#500g").val("").attr("disabled",false);
      $item_price = $self.parent().parent().find("#1kg");
      $item_price.attr("placeholder","1Kg Price");
    }

  }
</script>

<form class="form">
  <table class="table">
    <th>Veg</th>
    <th>Rs. 250g</th>
    <th>Rs. 500g</th>
    <th>Rs. 1kg</th>
    <th>Per item</th>
    
    <?php foreach($vegetables as $veg): ?>
	    <tr>
	       <td><img src="<?= base_url('assets/src/img/veg/').$veg->img ?>" height="50px" width="50px" id="<?= $veg->id ?>"/></td>
	       <td><input class="form-control form-control-sm" type="number" id="250g" placeholder="250g price"></td>
	       <td><input class="form-control form-control-sm" type="number" id="500g" placeholder="500g price"></td>
	       <td><input class="form-control form-control-sm" type="number" id="1kg"  placeholder="1Kg price"></td>
	       <td><input class="form-control form-control-sm" type="checkbox" id="item_price_status" onclick="chng_qty_mode(this)"></td>
	    </tr>
	<?php endforeach; ?>

    <tr>
      <td colspan="5">
        <center><input type="button" id="btn_add_price" value="Set Price" class="btn btn-sm btn-info"></center>
      </td>
    </tr>
  </table>
</form>