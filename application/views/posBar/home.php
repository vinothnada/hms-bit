
<!-- Main Container -->
<main id="main-container">
  <div class="content bg-gray-lighter">
    <div class="row items-push">
      <div class="col-sm-7">
        <h1 class="page-heading">
          POS(Bar)
        </h1>
      </div>
      <div class="col-sm-5 text-right hidden-xs">
        <ol class="breadcrumb push-10-t">
          <li>Home</li>
          <li><a class="link-effect" href="">POS Bar</a></li>
        </ol>
      </div>
    </div>
  </div>
	<!-- END Page Header -->
	<!-- Page Content -->
	<div class="content">
		<!-- Title links -->
		<div class="content content-boxed">
			<?php if ($this->session->userdata('error')) { ?>       
			<div class="alert alert-danger"><strong>Error!</strong> <?php echo $this->session->userdata('error'); ?> </div>
			<?php $this->session->unset_userdata('error');
		}
		?>
    		<?php if ($this->session->userdata('success')) { ?>      
    		<div class="alert alert-success"><strong>Success!</strong> <?php echo $this->session->userdata('success'); ?> </div>
    		<?php $this->session->unset_userdata('success');
	} 
	?>     
</div>
<div class="col-lg-6">
    <div class="block" style="height: 400px;"">
        <div class="block-header">
            <ul class="block-options">
                <li>
                    <button type="button"><i class="si si-settings"></i></button>
                </li>
            </ul>
            <h3 class="block-title">Add New Invoice</h3>
        </div>
        <div class="block-content block-content-narrow">
            <form class="js-validation-form form-horizontal push-10-t push-10" action="#"  method="post">
                <div class="form-group">
                    <div class="col-sm-9">
                       <div class="form-material">
                           <select class="form-control" id="tablenum"
                           name="tablenum">
                                  <option value="">Please Select..</option>                           
                              <?php foreach ($tableData as $list) { ?>
                                  <option value="<?= $list->tblnum?>"><?= $list->tblnum?></option>
                              <?php }?>
                       </select> <label for="tablenum">Table Number</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9">
                       <div class="form-material">
                           <select class="form-control" id="item"
                           name="item">
                                  <option value="">Please Select..</option>                           
                              <?php foreach ($menumaster as $list) { 
                                if ($list->mcname == "Special Bites" || $list->muname == "250 ML" || $list->muname == "500 ML" || $list->muname == "750 ML") { ?>
                                  <option value="<?= $list->itemname?>"><?= $list->itemname." (".$list->muname.") "?></option>
                              <?php }}?>
                       </select> <label for="item">Item Name</label>
                        </div>
                    </div>
                </div>
              <div class="form-group">
                  <div class="col-sm-9">
                      <div class="form-material">
                          <input class="form-control" type="text" id="qty" name="qty">
                          <label for="qty">Quantity</label>
                      </div>
                  </div>
              </div>                                                          
<div class="form-group">
    <div class="col-xs-12">
        <button class="btn btn-sm btn-primary" type="button" id="createId" >Create Item List</button>
        <button class="btn btn-sm btn-success" type="button" id="addId" disabled="">Add Item</button>
        <button class="btn btn-sm btn-danger" type="button" id="discardId" disabled="">Discard Invoice</button>
    </div>
</div>
</form>
</div>
</div>
<!-- END Material Forms Validation -->
</div>

<div id="posTable"></div>

</div>
<!-- END Page Content -->
</main>



<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>

   <button style="display: none;" id="requiredVal" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="All Fields are required"></button>     
   <button style="display: none;" id="numberVal" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Quantity should be a number"></button>     

<script>
  $("#createId").click(function(){

        var url = "<?= site_url("posBar/generatePosTable") ?>"
        var tablenum = $("#tablenum").val();
        var item = $("#item").val();
        var qty = $("#qty").val();
        var action = "Create";

        if (tablenum == "" || item == "" || qty == "") {
          $("#requiredVal").click();
        }else if(isNaN(qty)){
          $("#numberVal").click();
        }else{
        $.ajax({
            type: "post",
            url: url,
            data: {tablenum: tablenum,item:item,qty:qty,action:action},
            success: function(data){
                $("#posTable").css("display","block")
                $("#posTable").html(data);
                $("#createId").attr("disabled", true);
                $("#addId").attr("disabled", false);
                $("#discardId").attr("disabled", false);
                $("#tablenum").attr("disabled", true);
            }
        });
      }
  });

</script>

<script>
  $("#addId").click(function(){
        var url = "<?= site_url("posBar/generatePosTable") ?>"
        var tablenum = $("#tablenum").val();
        var item = $("#item").val();
        var qty = $("#qty").val();
        var action = "Add";
                if (tablenum == "" || item == "" || qty == "") {
          $("#requiredVal").click();
        }else if(isNaN(qty)){
          $("#numberVal").click();
        }else{
        $.ajax({
            type: "post",
            url: url,
            data: {tablenum: tablenum,item:item,qty:qty,action:action},
            success: function(data){
                $("#posTable").css("display","block")
                $("#posTable").html(data);
            }
        });
      }
  });


  $("#discardId").click(function(){
    <?php         
    $this->session->unset_userdata('index');
    $this->session->unset_userdata('dataArray'); 
    ?>
    location.reload();
  })

</script>

