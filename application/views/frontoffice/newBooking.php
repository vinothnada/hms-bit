<?php 
$taxArray = array();
$restaurantServicesArray = array();  
$barServicesArray = array();     

foreach ($taxservicesdata as $items) {
    if ($items->name == "Bar") {
        array_push($barServicesArray, $items->value);
    }elseif($items->name == "Restaurant"){
        array_push($restaurantServicesArray, $items->value);
    }elseif($items->name == "Tax"){
        array_push($taxArray, $items->value);
    }
}
?>

<?php 
$currentDate = date("m/d/Y h:i:sa");
$tomorrow = date("m/d/Y h:i:sa", time() + 86400);

$diff = abs(strtotime($tomorrow) - strtotime($currentDate))/(60*60);

echo "diff is".$diff;
 ?>

<!-- Main Container -->
<main id="main-container">

<!-- Hidden field for notificaton -->
<button style="display: none;" id="chkinerror" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Check-In-Date should not greater than Check-Out-Date :)"></button>

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
        <form class="js-validation-form form-horizontal" action="<?= site_url("frontoffice/addNewBooking"); ?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Bootstrap Forms Validation -->
                    <br>
                    <div class="block">
                        <div class="block-header">  
                            <h3 class="block-title">Guest Information</h3>
                        </div>
                        <div class="block-content block-content-narrow">
                        <input type="hidden" name="roomno" id="roomno" value="<?=$selectedroomno; ?>">
                        <input type="hidden" name="bookingno" id="bookingno" value="<?=$bookinginfo[0]->booking_no + 1; ?>">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Title</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="title" name="title" style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="">Choose One..</option>
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
                                    <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Enter First name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="lastname">Last Name</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Enter Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="identityType">Identity Type</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="identityType" name="identityType" style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="">Choose One..</option>
                                        <option value="Nic">NIC</option>
                                        <option value="DrivingLicense">Driving License</option>
                                        <option value="Passport">Passport</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="identityNo">Identity Number</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="identityNo" name="identityNo" placeholder="Identity Number">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="gender">Gender</label>
                                <div class="col-md-7">
                                    <select class="form-control" id="gender" name="gender" style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="">Choose One..</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="address">Addres</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="address" name="address" placeholder="Resident / Office">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="city">City</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="city" name="city" placeholder="Enter City">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="mobile">Contact number</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="mobile" name="mobile" placeholder="Contact number">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nationality">Nationality</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="nationality" name="nationality" placeholder="Enter Nationality">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bootstrap Forms Validation -->
                </div>
                <div class="col-lg-6">
                    <!-- Bootstrap Forms Validation -->
                    <br>
                    <div class="block">
                        <div class="block-header">  
                            <h3 class="block-title">Booking Information</h3>
                        </div>
                        <div class="block-content block-content-narrow">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="chkin_date">Check-In-Date</label>
                                <div class="col-md-7">
                                    <div class="js-datetimepicker input-group date" data-show-today-button="true" data-show-clear="true" data-show-close="true">
                                        <input class="form-control" type="text" id="chkin_date" name="chkin_date" placeholder="Choose a date.." value="<?=$currentDate;?>">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="chkout_date">Check-Out-Date</label>
                                <div class="col-md-7">
                                    <div class="js-datetimepicker input-group date" data-show-today-button="true" data-show-clear="true" data-show-close="true">
                                        <input class="form-control" type="text" id="chkout_date" name="chkout_date" placeholder="Choose a date.." value="<?=$tomorrow;?>">
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="tariff">Tariff</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="tariff" name="tariff" value="<?=$roomInfo[0]->tariff; ?>" readonly>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="tax">Tax</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="tax" name="tax" value="<?= $taxArray[0]; ?>&nbsp;%" readonly>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="tariffwithtax">Tariff with Tax</label>
                                <?php $tariffwithtax = $roomInfo[0]->tariff + $roomInfo[0]->tariff*$taxArray[0]/100; ?>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" id="tariffwithtax" name="tariffwithtax" value="<?=$tariffwithtax; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button class="btn btn-sm btn-primary" type="submit">Save Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bootstrap Forms Validation -->
                </div>            
            </div>
        </form>
    </div>
</main>



<!-- Page JS Plugins -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/custom/base_pages_roomBooking.js"></script> -->

<script>
    
$('#chkout_date').blur(function(){
    var chkindate = $('#chkin_date').val();
    var chkoutdate = $('#chkout_date').val();
    var sessionPrice = ($('#tariff').val())/2;
    var tax = "<?= $taxArray[0]; ?>";

    if (chkoutdate < chkindate) {
        $("#chkinerror").click();
    }else{
    var diff = (Date.parse(chkoutdate) - Date.parse(chkindate))/3600000/12;
    $('#tariff').val(sessionPrice * diff) ;
    $('#tariffwithtax').val((sessionPrice * diff) + (sessionPrice * diff * tax/100) ) ;        
    }



})

</script>