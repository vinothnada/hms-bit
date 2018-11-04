<!-- Main Container -->
<main id="main-container">
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h4 >
					View and Edit Guest Data
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
  <div class="block-content">
    <form class="js-validation-form form-horizontal" action="<?= site_url("guests/editGuesData"); ?>" method="post">
      <div class="row">
        <div class="col-lg-12">
          <!-- Bootstrap Forms Validation -->
          <br>
          <div class="block">
            <div class="block-header">  
              <h3 class="block-title">Guest Information</h3>
            </div>
            <div class="block-content block-content-narrow">
              <div class="form-group">
              <input type="hidden" name="id" value="<?=$guestdata[0]->id;?>">
                <label class="col-md-4 control-label" for="title">Title</label>
                <div class="col-md-7">
                  <select class="form-control" id="title" name="title" style="width: 100%;" data-placeholder="Choose one..">
                    <option value="<?=$guestdata[0]->title;?>" selected><?=$guestdata[0]->title;?></option>
                    <option value="Dr">Dr</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Ms">Ms</option>
                  </select>
                </div>
              </div>                        
              <div class="form-group">
                <label class="col-md-4 control-label" for="firstname">First Name</label>
                <div class="col-md-7">
                  <input class="form-control" type="text" id="firstname" name="firstname" Value="<?= $guestdata[0]->firstname;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="lastname">Last Name</label>
                <div class="col-md-7">
                  <input class="form-control" type="text" id="lastname" name="lastname" Value="<?= $guestdata[0]->lastname;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="identityType">Identity Type</label>
                <div class="col-md-7">
                  <select class="form-control" id="identityType" name="identityType" style="width: 100%;" data-placeholder="Choose one..">
                    <option value="<?=$guestdata[0]->identityType;?>" selected><?=$guestdata[0]->identityType;?></option>
                    <option value="Nic">NIC</option>
                    <option value="DrivingLicense">Driving License</option>
                    <option value="Passport">Passport</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="identityNo">Identity Number</label>
                <div class="col-md-7">
                  <input class="form-control" type="text" id="identityNo" name="identityNo" Value="<?= $guestdata[0]->identityNo;?>">
                </div>
              </div>                            
              <div class="form-group">
                <label class="col-md-4 control-label" for="gender">Gender</label>
                <div class="col-md-7">
                  <select class="form-control" id="gender" name="gender" style="width: 100%;" data-placeholder="Choose one..">
                    <option value="<?=$guestdata[0]->gender;?>" selected><?=$guestdata[0]->gender;?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="address">Addres</label>
                <div class="col-md-7">
                  <input class="form-control" type="text" id="address" name="address" Value="<?= $guestdata[0]->address;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="city">City</label>
                <div class="col-md-7">
                  <input class="form-control" type="text" id="city" name="city" Value="<?= $guestdata[0]->city;?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="mobile">Contact number</label>
                <div class="col-md-7">
                  <input class="form-control" type="text" id="mobile" name="mobile" Value="<?= $guestdata[0]->mobile;?>">
                </div>
              </div> 
              <div class="form-group">
                <label class="col-md-4 control-label" for="nationality">Nationality</label>
                <div class="col-md-7">
                  <input class="form-control" type="text" id="nationality" name="nationality" Value="<?= $guestdata[0]->nationality;?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                <button class="btn btn-sm btn-primary" type="submit">Update</button>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
<!-- END Page Content -->
</main>


<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/custom/base_pages_roomBooking.js"></script>

</script>