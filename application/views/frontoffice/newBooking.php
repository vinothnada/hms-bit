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

    <!-- Hidden field for notificaton -->
    <button style="display: none;" id="chkinerror" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Check-In-Date should not greater than Check-Out-Date :)"></button>
    <button style="display: none;" id="emptyError" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Please enter a keyword to search"></button>    


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
                <div class="col-xs-2">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Booking No</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX">BR<?=$bookinginfo[0]->booking_no + 1; ?></a>
                </div>
                <div class="col-xs-2">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Room Number</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX">R#<?=$selectedroomno; ?></a>
                </div>
                <div class="col-xs-2">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Price</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX">LKR <?=$roomInfo[0]->tariff; ?></a>
                </div>
                <div class="col-xs-3">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Room Type</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX"><?=$roomInfo[0]->type; ?></a>
                </div>                
                <div class="col-xs-2">
                    <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Status</small></div>
                    <a class="h3 font-w300 text-primary animated flipInX"><?=$roomInfo[0]->availibility; ?></a>
                </div>                

            </div>
        </div>
        <br>

        <div class="content bg-white border-b">
            <div class="row">
                <div class="col-xs-6">
                    <div class="block">
                        <div class="block-content block-content-narrow block-content-full">
                                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                    <input class="form-control" type="text" id="searchByIdText" placeholder="Search Guest By Identity Number..">
                                    <span class="input-group-addon" id="searchById" ><i class="si si-magnifier"></i></span>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="block">
                        <div class="block-content block-content-narrow block-content-full">
                                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                    <input class="form-control" type="text" id="searchByNameText" placeholder="Search Guest By Name..">
                                    <span class="input-group-addon" id="searchByName"><i class="si si-magnifier"></i></span>
                                </div>
                        </div>
                    </div>
                </div>            
            </div>    
        </div>
        <div id="searchDiv" style="display: none;">Loading</div>
        <br><br>

<div class="row">
        <div class="col-xs-12">
            <div class="block" style="height: 350px;overflow-y: scroll">
                <div class="block-header">  
                    <h3 class="block-title">Advance Booking information of Room Number <strong><?=$selectedroomno;?></strong></h3>
                </div>        
                <div class="block-content">
                                    <div data-toggle="slimscroll" data-height="300px" data-color="#46c37b" data-always-visible="true">                
                  <?php if (count($adbookall) > 0) { ?>
                  <table class="table table-bordered table-striped js-dataTable-full js-table-section">
                   <thead>
                      <tr>
                         <th class="hidden-xs" >Name/Contact</th>                  
                         <th class="hidden-xs" >Start date</th>
                         <th class="hidden-xs" >end date</th>
                         <th class="hidden-xs" >Status</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php foreach ($adbookall as $items) { ?>
                   <?php if ($items->roomno == $selectedroomno) { ?>
                   <tr>
                     <td class="hidden-xs"><?=$items->name;?></td>
                     <td class="hidden-xs"><?= substr($items->start, 0,10);?></td>
                     <td class="hidden-xs"><?= substr($items->end, 0,10);?></td>
                     <?php if ($items->status == 'Active') { ?>
                     <td class="hidden-xs"><span  class="label label-success"><?=$items->status;?></span></td>
                     <?php }else{ ?>
                     <td class="hidden-xs"><span  class="label label-warning"><?=$items->status;?></span></td>
                     <?php } ?>
                 </tr>
                   <?php } ?>
                 <?php } ?>
             </tbody>
         </table>
         <?php }else{ ?>
         <h5 style="text-align: center"><span class="text-info">No Advance Booking records Found</span></h5><br>
         <?php } ?>
         </div>
     </div>
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
                            <input type="hidden" name="currentGuest" id="currentGuest" value="null">
                            <input type="hidden" name="modified_By" id="modified_By" value="<?=$logged_user;?>">
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
                                        <input class="form-control" type="text" id="chkin_date" name="chkin_date" placeholder="Choose a date.." value="<?=$currentDate;?>" readonly>
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
                                <label class="col-md-4 control-label" for="tariffwithtax">Link With Advance Booking</label>
                                <div class="col-md-7">
                                <label class="css-input switch switch-sm switch-primary">
                                    <input type="checkbox" id="checkLinkedAd"><span></span>
                                </label>                                    
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
<script src="<?= base_url(); ?>assets/js/custom/base_pages_roomBooking.js"></script>

<script>

// script to validate and assign checkin and checkout dates
$('#chkout_date').blur(function(){
    var chkindate = $('#chkin_date').val();
    var chkoutdate = $('#chkout_date').val();
    var sessionPrice = "<?=$roomInfo[0]->tariff; ?>";
    var tax = "<?= $taxArray[0]; ?>";
    var different = (Date.parse(chkoutdate) - Date.parse(chkindate))/3600000/24;

    if (chkoutdate < chkindate) {
        $("#chkinerror").click();
    }else if (different<1) {
        $('#tariff').val(sessionPrice) ;
        $('#tariffwithtax').val((sessionPrice) + (sessionPrice * tax/100) ) ;  
    }else{            
        $('#tariff').val(sessionPrice * different) ;
        $('#tariffwithtax').val((sessionPrice * different) + (sessionPrice * different * tax/100) ) ;        
    }
})

// Scripts to seach guests

    $("#searchById").click(function(){
        var searchText = $("#searchByIdText").val();

        if (searchText == "" || searchText == null) {
            $("#emptyError").click();
        }else{
        var url = "<?= site_url("frontoffice/searchByIdentity") ?>"
        $.ajax({
            type: "GET",
            url: url,
            data: {searchText: searchText},
            success: function(data){
                $("#searchDiv").css("display","block")
                $("#searchDiv").html(data);
            }
        });
    }
    }); 


    $("#searchByName").click(function(){
        var searchText = $("#searchByNameText").val();

        if (searchText == "" || searchText == null) {
            $("#emptyError").click();
        }else{
        var url = "<?= site_url("frontoffice/searchByName") ?>"
        $.ajax({
            type: "GET",
            url: url,
            data: {searchText: searchText},
            success: function(data){
                $("#searchDiv").css("display","block")
                $("#searchDiv").html(data);
            }
        });
    }
    }) 

</script>

<script >
  function getData(id){
        var gId = id;
        var url = "<?= site_url("frontoffice/searchGuestById") ?>";
        $.ajax({
            type: "GET",
            url: url,
            data: {gId: gId},
            dataType: 'json',
            success: function(data){
              // var result = json.parse(data);
              $("#title").val(data[0]['title']);
              $("#firstname").val(data[0]['firstname']);
              $("#lastname").val(data[0]['lastname']);
              $("#identityType").val(data[0]['identityType']);
              $("#identityNo").val(data[0]['identityNo']);
              $("#gender").val(data[0]['gender']);
              $("#address").val(data[0]['address']);
              $("#city").val(data[0]['city']);
              $("#mobile").val(data[0]['mobile']);
              $("#nationality").val(data[0]['nationality']);
              $("#currentGuest").val(data[0]['id']);
            }
        });
    }
</script>


<script type="text/javascript">
    
        function convertToUtc(str) {
        var date = new Date(str);
        var year = date.getUTCFullYear();
        var month = date.getUTCMonth()+1;
        var dd = dategetUTCDate();
        var hh = date.getUTCHours(); 
        var mi = date.getUTCMinutes();
        var sec = date.getUTCSeconds();

        // 2010-11-12T13:14:15Z

        theDate = year + "-" + (month [1] ? month : "0" + month [0]) + "-" + 
                  (dd[1] ? dd : "0" + dd[0]);
       theTime = (hh[1] ? hh : "0" + hh[0]) + ":" + (mi[1] ? mi : "0" + mi[0]);
        return [ theDate, theTime ].join("T");
     }
     
</script>

<script>

$("#checkLinkedAd").change(function () {
    if (this.checked) {
        alert("Thanks for checking me");
    }
});

 
</script>