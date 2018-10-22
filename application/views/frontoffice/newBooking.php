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
                        <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/base_forms_validation.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-bootstrap form-horizontal" action="base_forms_validation.html" method="post">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="val-username">Username <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="val-username" name="val-username" placeholder="Choose a nice username..">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="val-email">Email <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="val-email" name="val-email" placeholder="Enter your valid email..">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="val-password">Password <span class="text-danger">*</span></label>
                                <div class="col-md-7">
                                    <input class="form-control" type="password" id="val-password" name="val-password" placeholder="Choose a good one..">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-4 control-label"><a data-toggle="modal" data-target="#modal-terms" href="#">Terms</a> <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <label class="css-input css-checkbox css-checkbox-primary" for="val-terms">
                                        <input type="checkbox" id="val-terms" name="val-terms" value="1"><span></span> I agree to the terms
                                    </label>
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