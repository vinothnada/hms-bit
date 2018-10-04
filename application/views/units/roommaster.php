<!-- Main Container -->
<main id="main-container">
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h4 >
					Room Master
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
	<!-- Quick links -->
</div>
<!-- room List -->
<div class="block">
	<div class="block-header">
		<div class="block-options">
          <button class="	btn btn-primary" data-toggle="modal" data-target="#modal-popin-addroom"><i class="glyphicon-plus"></i>&nbsp;Add new</button>
      </div>
  </div>
  <div class="block-content">
      <table class="table table-bordered table-striped js-dataTable-full"">
       <thead>
        <tr>
         <th class="text-center" >Room No</th>
         <th>Room type</th>
         <th class="hidden-xs" >Floor Type</th>                  
         <th class="hidden-xs" >Building</th>					
         <th class="hidden-xs" >Toilet</th>
         <th class="hidden-xs" >Tariff</th>
         <th class="hidden-xs" >Status</th>
         <th class="text-center" style="width: 100px;">Actions</th>
     </tr>
 </thead>
 <tbody>

   <?php foreach ($roommaster as $items) { ?>
   <tr>
     <td class="text-center">#<?=$items->roomno;?></td>
     <td><?=$items->type;?></td>
     <td class="hidden-xs"><?=$items->name;?></td>
     <td class="hidden-xs"><?=$items->building;?></td>
  <td><?=$items->toilet;?></td>
  <td><?=$items->tariff;?></td>
     <?php if ($items->availibility == 'Available') { ?>
     <td class="hidden-xs"><span class="label label-success"><?=$items->availibility;?></span></td>
     <?php }else{ ?>
     <td class="hidden-xs"><span class="label label-danger"><?=$items->availibility;?></span></td>
     <?php } ?>
  <td class="text-center">
      <div class="btn-group">
        <a href="<?= site_url("units/editRoom?id=$items->id") ?>">                        
           <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
           <a href="<?= site_url("units/deleteRoom?id=$items->id") ?>">                            
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
<!-- END Page Content -->
</main>


<!-- Pop In Modal - room types -->
<div class="modal fade" id="modal-popin-addroom" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popin">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Add New room types</h3>
                </div>
                <div class="block-content">
                    <form class="js-validation-form form-horizontal push-10-t push-10"
                    action="<?=site_url("units/addRoom")?>" method="post">
                  <div class="form-group">
                      <div class="col-xs-6">
                          <div class="form-material">                          
                              <input class="form-control" type="text" id="roomno" readonly="readonly"
                                     name="roomno" value="<?= $roommasterDesc[0]->id + 1; ?>">
                              <label for="roomno">Room Number</label>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="roomtype"
                                      name="roomtype">
                                  <option value="">Please Select</option>
                              <?php foreach ($roomtypes as $list) { ?>
                                  <option value="<?= $list->id?>"><?= $list->type?></option>
                              <?php }?>
                              </select> <label for="roomtype">Room Type</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="floortype"
                                      name="floortype">
                                  <option value="">Please Select</option>
                              <?php foreach ($floortypes as $list) { ?>
                                  <option value="<?= $list->id?>"><?= $list->name?></option>
                              <?php }?>
                              </select> <label for="floortype">Floor</label>
                          </div>
                      </div>
                      <div class="col-xs-6">
                          <div class="form-material">
                              <select class="form-control" id="toilet"
                                      name="toilet">
                                  <option value="">Please Select</option>
                                  <option value="English">English</option>
                                  <option value="Others">Others</option>
                              </select> <label for="toilet">Toilet</label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-6">
                        <div class="form-material">
                            <select class="form-control" id="availibility"
                                    name="availibility">
                                <option value="">Please Select</option>
                                <option value="Available">Available</option>
                                <option value="Maintanance">Maintanance</option>
                                <option value="Full">Full</option>
                            </select> <label for="availibility">Status</label>
                        </div>
                        </div>
                  </div>                                                        
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fa fa-plus push-5-r"></i> Create
                            </button>
                        </div>
                    </div>
                </div>                              
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- END Pop In Modal -->


<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_addRooms.js"></script>