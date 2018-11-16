<!-- Main Container -->
<main id="main-container">
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h4 >
					Rooms and Floors
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
		<button class="	btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-popin-addroom"><i class="glyphicon-plus"></i>&nbsp;Add new</button>
        <?php $this->session->set_userdata('csvdata1',$roomtypes); ?>
        &nbsp;
        <a href="<?= site_url("reports/exportRoomtypes") ?>"><button class="btn btn-sm btn-danger pull-right" type="button" id="cid" ><i class="fa fa-file-pdf-o"></i>&nbsp; Export CSV</button></a>
		</div>
		<h3 class="block-title">Room Types</h3>
	</div>
	<div class="block-content">
		<table class="table table-condensed">
			<thead>
				<tr>
					<th class="text-center" style="width: 50px;">#</th>
					<th>Roomtype Name</th>
					<th class="hidden-xs" style="width: 15%;">Tariff</th>					
					<th class="hidden-xs" style="width: 15%;">Status</th>
					<th class="text-center" style="width: 100px;">Actions</th>
				</tr>
			</thead>
			<tbody>

			<?php $i = 1;?>
			<?php foreach ($roomtypes as $items) { ?>
				<tr>
					<td class="text-center"><?=$i?></td>
					<td><?=$items->type;?></td>
					<td class="hidden-xs">
						<span class="label label-success">LKR <?=$items->tariff;?></span>
					</td>
					<td><?=$items->status;?></td>
					<td class="text-center">
						<div class="btn-group">
                            <a href="<?= site_url("units/editNewRoomtypes?id=$items->id") ?>">                        
							<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
                            <a href="<?= site_url("units/deleteNewRoomtypes?id=$items->id") ?>">                            
							<button class="btn btn-xs btn-default" type="button" onClick="return confirm('Are You Sure to Delete?')" data-toggle="tooltip" title="Remove" ><i class="fa fa-times"></i></button></a>
						</div>
					</td>
				</tr>
				<?php $i+=1?>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="block">
    <div class="block-header">
        <div class="block-options">
        <button class=" btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-popin-addfloor"><i class="glyphicon-plus"></i>&nbsp;Add new</button>
        <?php $this->session->set_userdata('csvdata2',$roomtypes); ?>
        &nbsp;
        <a href="<?= site_url("reports/exportFloortypes") ?>"><button class="btn btn-sm btn-danger pull-right" type="button" id="cid" ><i class="fa fa-file-pdf-o"></i>&nbsp; Export CSV</button></a>        
        </div>
        <h3 class="block-title">Floors</h3>
    </div>
    <div class="block-content">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Floor Name</th>
                    <th class="hidden-xs" style="width: 25%;">Building</th>                   
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php $i = 1;?>
            <?php foreach ($floortypes as $items) { ?>
                <tr>
                    <td class="text-center"><?=$i?></td>
                    <td><?=$items->name;?></td>
                    <td class="hidden-xs">
                        <span> <?=$items->building;?></span>
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="<?= site_url("units/editFloortypes?id=$items->id") ?>">                        
                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
                            <a href="<?= site_url("units/deleteFloortypes?id=$items->id") ?>">                            
                            <button class="btn btn-xs btn-default" type="button" onClick="return confirm('Are You Sure to Delete?')" data-toggle="tooltip" title="Remove" ><i class="fa fa-times"></i></button></a>
                        </div>
                    </td>
                </tr>
                <?php $i+=1?>
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
                                action="<?=site_url("units/addNewRoomtypes")?>" method="post">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="type"
                                               name="type" placeholder="Please fill type">
                                        <label for="type">Type</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="tariff"
                                               name="tariff" placeholder="Please fill tariff">
                                        <label for="tariff">Tariff</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="form-control" id="status"
                                                name="status">
                                            <option value="">Please Select</option>
                                            <option value="Active">Active</option>
                                            <option value="Disabled">Disabled</option>
                                        </select> <label for="Status">Status</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="remarks"
                                               name="remarks" placeholder="Please fill remarks">
                                        <label for="remarks">remarks</label>
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



<!-- Pop In Modal - Floor types -->
        <div class="modal fade" id="modal-popin-addfloor" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Add New Floor types</h3>
                        </div>
                        <div class="block-content">
                            <form class="js-validation-form form-horizontal push-10-t push-10"
                                action="<?=site_url("units/addFloors")?>" method="post">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="name"
                                               name="name" placeholder="Please fill name">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="building"
                                               name="building" placeholder="Please fill building">
                                        <label for="building">Building</label>
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
<script src="<?= base_url(); ?>assets/js/custom/base_pages_roomtypes.js"></script>