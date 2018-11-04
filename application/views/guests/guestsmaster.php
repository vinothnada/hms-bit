<!-- Main Container -->
<main id="main-container">
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h4 >
					Registered Guests
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
  </div>
  <div class="block-content">
      <table class="table table-bordered table-striped js-dataTable-full js-table-section">
       <thead>
        <tr>
         <th class="text-center" >#</th>
         <th>Name</th>
         <th class="hidden-xs" >Identity No</th>                  
         <th class="hidden-xs" >Nationality</th>					
         <th class="hidden-xs" >Gender</th>
         <th class="hidden-xs" >Mobile</th>
         <th class="text-center" style="width: 100px;">Actions</th>
     </tr>
 </thead>
 <tbody>

   <?php foreach ($guestsdata as $items) { ?>
   <tr>
     <td class="text-center"><?=$items->id;?></td>
     <td><?=$items->firstname." ".$items->lastname;?></td>
     <td class="hidden-xs"><?=$items->identityNo;?></td>
     <td class="hidden-xs"><?=$items->nationality;?></td>
     <td class="hidden-xs"><?=$items->gender;?></td>
     <td class="hidden-xs"><?=$items->mobile;?></td>

  <td class="text-center">
      <div class="btn-group">
        <a href="<?= site_url("guests/editGuesData?id=$items->id") ?>">                        
           <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
           <a href="<?= site_url("guests/deleteGuestData?id=$items->id") ?>">                            
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


<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_addMenuItem.js"></script>