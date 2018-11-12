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

$logged_user = $this->session->userdata('logged_user');
?>

<!-- Main Container -->
<main id="main-container">

    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Occupied Room info 
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Home</li>
                    <li><a class="link-effect" href="">Occupied Room info</a></li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Hidden field for notificaton -->
    <button style="display: none;" id="chkinerror" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="New Check-Out-Date-Date should not greater than Current Check-Out-Date"></button>


    <!-- Page Content -->
    <div class="content">
        <div class="content bg-white border-b">

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
    <div class="row items-push text-uppercase">
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Booking No</small></div>
            <a class="h3 font-w300 text-primary animated flipInX">BR<?=$bookinginfo[0]->booking_no; ?></a>
        </div>
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Room Number</small></div>
            <a class="h3 font-w300 text-primary animated flipInX">R#<?=$selectedroomno; ?></a>
        </div>
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Price</small></div>
            <a class="h3 font-w300 text-primary animated flipInX">LKR <?=$roomInfo[0]->tariff; ?></a>
        </div>
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Room Type</small></div>
            <a class="h3 font-w300 text-primary animated flipInX"><?=$roomInfo[0]->type; ?></a>
        </div>                
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Status</small></div>
            <a class="h3 font-w300 text-primary animated flipInX"><?=$roomInfo[0]->availibility; ?></a>
        </div>
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-user"></i> Guest Name</small></div>
            <a class="h3 font-w300 text-primary animated flipInX"><?=$guestinfo[0]->title." ".$guestinfo[0]->firstname." ".$guestinfo[0]->lastname; ?></a>
        </div>        
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-user"></i> Checked in Date</small></div>
            <a class="h3 font-w300 text-primary animated flipInX"><?=substr($bookinginfo[0]->chkin_date, 0,10); ?></a>
        </div>
        <div class="col-xs-3">
            <div class="text-muted animated fadeIn"><small><i class="si si-user"></i> Checked out Date</small></div>
            <a class="h3 font-w300 text-primary animated flipInX"><?=substr($bookinginfo[0]->chkout_date, 0,10);; ?></a>
        </div>                                   

    </div>
</div>

<br><br>


<form class="js-validation-form form-horizontal" action="<?= site_url("frontoffice/extendBooking"); ?>" method="post">
    <div class="row">
        
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
                            <input class="form-control" type="text" id="chkin_date" name="chkin_date" value="<?=$bookinginfo[0]->chkin_date; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="chkout_date_current">Check-Out-Date</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" id="chkout_date_current" name="chkout_date_current" value="<?=$bookinginfo[0]->chkout_date; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="chkout_date">Update Check-Out-Date</label>
                        <div class="col-md-7">
                            <div class="js-datetimepicker input-group date" data-show-today-button="true" data-show-clear="true" data-show-close="true">
                                <input class="form-control" type="text" id="chkout_date" name="chkout_date" placeholder="Choose a date..">
                                <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="tariff">Room Tariff / Day</label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" id="tariff" name="tariff" value="<?=$roomInfo[0]->tariff; ?>" readonly>
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
                        <label class="col-md-4 control-label" >Change of Room</label>
                        <div class="col-md-7">
                            <label class="css-input switch switch-sm switch-warning">
                                <input type="checkbox" id="checkLinkedAd" name="checkLinkedAd"><span></span>
                            </label>                                    
                        </div>
                    </div>
                    <div class="form-group" style="display: none" id="adLinkSelect">
                        <label class="col-md-4 control-label" for="newRoomNo">Available rooms</label>
                        <div class="col-md-7">
                            <select class="form-control" id="newRoomNo" name="newRoomNo" style="width: 100%;" data-placeholder="Choose one..">
                                <option value="">Select</option>
                                <?php foreach ($availableRooms as $items) { ?>
                                <option value="<?=$items->roomno;?>">Room : <?=$items->roomno;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="bookingno" id="bookingno" value="<?=$bookinginfo[0]->booking_no;?>" />
                    <input type="hidden" name="currentRoomNo" id="currentRoomNo" value="<?=$selectedroomno; ?>" />
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button class="btn btn-sm btn-success" type="submit">Extend Booking</button>
                            <a href="ass"><button class="btn btn-sm btn-danger" type="button">Checkout</button></a>
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
<script src="<?= base_url(); ?>assets/js/custom/base_pages_roomBooking.js"></script>

<script>

// script to validate and assign checkin and checkout dates
$('#chkout_date').blur(function(){
    var chkout_date_current = $('#chkout_date_current').val();
    var chkoutdate = $('#chkout_date').val();

    if (Date.parse(chkoutdate) <= Date.parse(chkout_date_current)) {
        $("#chkinerror").click();
        $('#chkout_date').val('');        
    }

});

</script>

<script>

    $("#checkLinkedAd").change(function () {
        if (this.checked) {
            $("#adLinkSelect").css("display","block");
        }else{
            $("#adLinkSelect").css("display","none");
        }
    });

</script>