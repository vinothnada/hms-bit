<!-- Main Container -->
<main id="main-container">
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h4 >
					Table Master
				</h4>
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
	<div class="block">
	<div class="block-header">
    <h3 class="block-title">Table Info</h3>
  </div>
  <div class="block-content">
      <table class="table table-bordered table-striped js-dataTable-full">
       <thead>
        <tr>
         <th class="text-center" >Tbl Number</th>
         <th>Seats</th>
         <th class="hidden-xs" >Status</th>                  
         <th class="text-center">Actions</th>
     </tr>
 </thead>
 <tbody>
   <?php foreach ($tabledata as $items) { ?>
   <tr>
     <td class="text-center"><?=$items->tblnum;?></td>
     <td><?=$items->seats;?></td>
     <?php if ($items->status == 'Active') { ?>
     <td class="hidden-xs"><span class="label label-success"><?=$items->status;?></span></td>
     <?php }else{ ?>
     <td class="hidden-xs"><span class="label label-danger"><?=$items->status;?></span></td>
     <?php } ?>
  <td class="text-center">
      <div class="btn-group">
        <a href="<?= site_url("units/editMenuMaster?id=$items->id") ?>">                        
           <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
           <a href="<?= site_url("units/deleteMenuMaster?id=$items->id") ?>">                            
               <button class="btn btn-xs btn-default" type="button" onClick="return confirm('Are You Sure to Delete?')" data-toggle="tooltip" title="Remove" ><i class="fa fa-times"></i></button></a>
           </div>
       </td>
   </tr>
   <?php } ?>
</tbody>
</table>
</div>
</div>
</div>
                        <div class="col-lg-6">
                            <div class="block">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button"><i class="si si-settings"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Add New Table</h3>
                                </div>
                                <div class="block-content block-content-narrow">
                                    <!-- jQuery Validation (.js-validation-material class is initialized in js/pages/base_forms_validation.js) -->
                                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form class="js-validation-material form-horizontal push-10-t" action="base_forms_validation.html" method="post">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="tblnum" name="tblnum" placeholder="Type the Table Number">
                                                    <label for="tblnum">Table Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
					                            <div class="form-material">
					                                <select class="form-control" id="seats"
					                                        name="status">
					                                    <option value="">Please Select</option>
					                                    <option value="2">2</option>
					                                    <option value="4">4</option>
					                                    <option value="6">6</option>
					                                    <option value="8">8</option>
					                                    <option value="10">10</option>
					                                </select> <label for="seats">Seats</label>
					                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
					                            <div class="form-material">
					                                <select class="form-control" id="status"
					                                        name="status">
					                                    <option value="">Please Select</option>
					                                    <option value="Active">Active</option>
					                                    <option value="Blocked">Blocked</option>
					                                </select> <label for="Status">Status</label>
					                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="cat" name="cat" value="Restaurant" readonly=>
                                                    <label for="cat">Adding to</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Material Forms Validation -->
                        </div>

</div>
<!-- END Page Content -->
</main>



<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_addMenuItem.js"></script>