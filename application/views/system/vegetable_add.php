
<script>
  function showProcess(token){
    if(token){
      $("#process_window").removeClass("d-none").addClass("process_window");
      $("#process_content").addClass("process_content").html("Please Wait..");
    }else{
      setInterval(function(){
        $("#process_content").removeClass("process_content").html("");
        $("#process_window").removeClass("process_window").addClass("d-none");
      },3000);
    }
  }
  function action(self,token=false){
    $actionTarget = $(self)
    $parentAction = $actionTarget.parent();
    $action_name = $actionTarget.val();
    if($action_name == "Edit"){
      $parentAction.find("#btn_save,#btn_cancel").removeClass("d-none");
      $parentAction.find("#btn_delete").addClass("d-none");
      $actionTarget.parent().parent().find("#veg_name,#veg_dec").attr("disabled",false);
      $actionTarget.parent().parent().find("#veg_img_for").attr("for","veg_img");
      $actionTarget.addClass("d-none");
    }else  if($action_name == "Delete"){
      if(confirm("[DELETE] Are you sure!")){
        if($actionTarget.parent().parent()[0].tagName == "TR"){
          // Remove POST
          $(document).ready(function(){
            // $.post("<?= base_url('/ajaxrequest/remove_veg/') ?>/"+$actionTarget.parent().parent().find("#veg_id").text(),function(){

            //   debugger;
            //   });
            // });
          $currentTR = $parentAction.parent();
          $currentTR = $parentAction.parent().remove();
        });
      }else{ return false; }
    }else if($action_name == "Save"){
      $actionTarget.addClass("disabled");
      if($parentAction.parent().find("#veg_name").val() != "" && $parentAction.parent().find("#veg_dec").val() != ""){
        if(token){
          // New POST
          alert("new");
          $currentTR = $actionTarget.parent().parent();
          $currentTR.find("#veg_name,#veg_dec").val("");
          $actionTarget.removeClass("disabled");
        }else{
          // Update POST
          alert("update");
          $currentTR = $actionTarget.parent().parent();
          $currentTR.find("#veg_name,#veg_dec").addClass("disabled");
          $actionTarget.removeClass("disabled");
          // record saved
          $parentAction.find("#btn_save,#btn_cancel").addClass("d-none");
          $parentAction.find("#btn_edit,#btn_delete").removeClass("d-none");
          $parentAction.parent().find("#veg_name,#veg_dec").attr("disabled",true);
        }
      }else{
        $actionTarget.removeClass("disabled");
        alert("Fill all details");
      }
    }else if($action_name == "Cancel"){
      $parentAction.find("#btn_edit,#btn_delete").removeClass("d-none");
      $parentAction.find("#btn_save").addClass("d-none");
      $actionTarget.addClass("d-none");
      $parentAction.parent().find("#veg_name,#veg_dec").attr("disabled",true);
      alert("Update Not Saved!");
    }
  }
}
</script>
<div id="process_window" class="d-none">
  <img src="https://loading.io/spinners/lava-lamp/lg.lava-lamp-preloader.gif" id="process_img" class="process_img">
  <p id="process_content"></p>
</div>
<span id="error"></span>
<table class="table">
  <th>ID</th>
  <th>Vegetable</th>
  <th>Description</th>
  <th>Action</th>
    
    <tr>
      <td colspan="4"><center><b>Add New</b></center></td>
    </tr>
    <tr style="background-color: #FFAA;">
      <td>#Vxx</td>
      <td><label for="veg_img"><img src="" height="20px" width="20px"></label><input type="file" id="veg_img" name="veg_img" class="d-none"><br/><input type="text" name="veg_name" id="veg_name" class="form-control form-control-sm" placeholder="Name"></td>
      <td><textarea id="veg_dec" name="veg_dec" class="form-control form-control-sm" rows="5"></textarea></td>
      <td>
        <input type="button" name="btn_save"  id="btn_save" value="Save" class="btn btn-sm btn-primary" onclick="action(this,true)">
        <input type="button" name="btn_cancel" value="Cancel" class="btn btn-sm btn-info d-none" onclick="action(this)">
      </td>
    </tr>

    <tr>
      <td colspan="4"><center><b>Update</b></center></td>
    </tr>

    <?php foreach($veges as $vege): ?>
    <tr>
      <td><small><p id="veg_id"><?= $vege->id ?></p></small></td>
      <td>
        <label for="" id="veg_img_for"><img height="20px" width="20px" src="<?= base_url('assets/src/img/') ?>/<?= $vege->img ?>"></label>
        <input type="file" id="veg_img" name="veg_img" class="d-none"><br/>
        <input type="text" name="veg_name" id="veg_name" value="<?= $vege->name ?>" class="form-control form-control-sm" disabled="">
      </td>
      <td><textarea id="veg_dec" name="veg_dec" class="form-control form-control-sm" rows="5" disabled=""><?= $vege->info ?></textarea></td>
      <td>
        <input type="button" name="btn_edit" value="Edit" id="btn_edit" class="btn btn-sm " onclick="action(this)">
        <input type="button" name="btn_save" value="Save" id="btn_save" class="btn btn-sm  d-none" onclick="action(this)">
        <input type="button" name="btn_cancel" value="Cancel" id="btn_cancel" class="btn btn-sm d-none" onclick="action(this)">
        <input type="button" name="btn_delete" value="Delete" id="btn_delete" class="btn btn-sm " onclick="action(this)">
      </td>
    </tr>
	<?php endforeach; ?>

</table>