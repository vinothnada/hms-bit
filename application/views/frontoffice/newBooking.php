<!-- Main Container -->
<main id="main-container">

	<!-- Page Content -->
	<div class="content">
        <div class="content bg-white border-b">
            <div class="row items-push text-uppercase">
                <div class="col-xs-6 col-sm-3">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Booking No</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX">BR<?=$bookinginfo[0]->booking_no + 1; ?></a>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Room Type</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX"><?=$roomInfo[0]->type; ?></a>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Price</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX">LKR <?=$roomInfo[0]->tariff; ?></a>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Status</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX"><?=$roomInfo[0]->availibility; ?></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <!-- Bootstrap Forms Validation -->
                <br>
                <div class="block">
                    <div class="block-header">  
                        <h3 class="block-title">Guest Information</h3>
                    </div>
                    <div class="block-content block-content-narrow">
                        <form class="js-validation-bootstrap form-horizontal" action="base_forms_validation.html" method="post">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Title</label>
                                <div class="col-md-7">
                                    <select class="js-select2 form-control" id="title" name="title" style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="Dr">Dr</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                </div>
                            </div>                        
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="firstname">First Name <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Enter First name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="lastname">Last Name <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Enter Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="gender">Gender</label>
                                <div class="col-md-7">
                                    <select class="js-select2 form-control" id="gender" name="gender" style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="address">Address<span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="address" name="address" placeholder="Resident / Office">
                                </div>
                            </div>                                                                                     
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Bootstrap Forms Validation -->
            </div>
        </div>
    </div>
</main>