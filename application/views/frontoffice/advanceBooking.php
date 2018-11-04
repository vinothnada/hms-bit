    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- demo stylesheet -->
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/helpers/demo.css?v=2018.4.3469" />
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/helpers/media/layout.css?v=2018.4.3469" />
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/helpers/media/elements.css?v=2018.4.3469" />

    <!-- helper libraries -->
    <script src="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/helpers/jquery-1.12.2.min.js" type="text/javascript"></script>
    
    <!-- daypilot libraries -->
    <script src="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/js/daypilot-all.min.js?v=2018.4.3469" type="text/javascript"></script>

    <!-- daypilot themes -->
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/areas.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/month_white.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/month_green.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/month_transparent.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/month_traditional.css?v=2018.4.3469" />
        
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/navigator_8.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/navigator_white.css?v=2018.4.3469" />    
        
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/calendar_transparent.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/calendar_white.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/calendar_green.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/calendar_traditional.css?v=2018.4.3469" />

    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/scheduler_8.css?v=2018.4.3469" />
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/scheduler_white.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/scheduler_green.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/scheduler_blue.css?v=2018.4.3469" />    
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/scheduler_traditional.css?v=2018.4.3469" />
    <link type="text/css" rel="stylesheet" href="<?= base_url(); ?>assets/js/plugins/daypilot-pro/demo/themes/scheduler_transparent.css?v=2018.4.3469" />    


<?php 

// Arry for list room and its types
$master = array();

$i = 0;
foreach ($roomtypes as $item) {
    $master[$i]['name'] = $item->type;
    $master[$i]['id'] = $item->id;
    $master[$i]['expanded'] = true;

    $j = 0;
    foreach ($roommaster as $key) {
        if ($item->type == $key->type) {
            $master[$i]['children'][$j]['id'] = "R". $key->roomno;
            $master[$i]['children'][$j]['name'] = $key->roomno;
        $j = $j+1;
        }
    }

    $i = $i+1;
}
$roomDataForTable = json_encode($master);


// Get unavailable rooms

$narooms = array();
foreach ($roommaster as $key) {
    if ($key->availibility == "Maintanance") {
        array_push($narooms, "R".$key->roomno);
    }
}

$narooms_json = json_encode($narooms);

// Display events

$bookingsmaster = array();

$i = 0;
foreach ($adbook as $item) {
    $bookingsmaster[$i]['start'] = $item->start;
    $bookingsmaster[$i]['end'] = $item->end;
    $bookingsmaster[$i]['id'] = "adb".$item->id;
    $bookingsmaster[$i]['resource'] = "R".$item->roomno;
    $bookingsmaster[$i]['text'] = $item->name;
    $bookingsmaster[$i]['bubbleHtml'] = $item->name;
    $bookingsmaster[$i]['barColor'] = "#3c78d8";
    $bookingsmaster[$i]['barBackColor'] = "#3c78d8";
    $bookingsmaster[$i]['moveDisabled'] = "true";
    $i = $i+1;
}

foreach ($bookinginfo as $item) {
    $bookingsmaster[$i]['start'] = $item->chkin_date;
    $bookingsmaster[$i]['end'] = $item->chkout_date;
    $bookingsmaster[$i]['id'] = "occ".$item->id;
    $bookingsmaster[$i]['resource'] = "R".$item->room_no;
    $bookingsmaster[$i]['text'] = "Occupied";
    $bookingsmaster[$i]['bubbleHtml'] = "Occupied";
    $bookingsmaster[$i]['barColor'] = "#6aa84f";
    $bookingsmaster[$i]['barBackColor'] = "#6aa84f";
    $bookingsmaster[$i]['moveDisabled'] = "true";
    $i = $i+1;
}


$bookingsmasterJson = json_encode($bookingsmaster);


 ?>

<style >
    
    .scheduler_default_corner div:nth-of-type(2){
        display: none !important;
    }

</style>
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->

    <button style="display: none;" id="created" class="js-notify btn btn-sm btn-success" data-notify-type="success" data-notify-icon="fa fa-check" data-notify-message="Booking Created Successfully"></button>
    <button style="display: none;" id="deleted" class="js-notify btn btn-sm btn-success" data-notify-type="success" data-notify-icon="fa fa-check" data-notify-message="Booking Deleted Successfully"></button>  
    <button style="display: none;" id="occdelete" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Cannot Delete a Occupied Booking"></button>      


    <div class="content">
        <div>
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
        <br>
        <div class="content bg-white border-b">
            <div class="row">
                <div class="col-xs-12">
                    <div id="dp"></div>
                </div>            
            </div>    
        </div>
    </div>
</main>

<script type="text/javascript">


    var dp = new DayPilot.Scheduler("dp");

    dp.startDate = "2018-01-01";
    dp.days = 365;
    dp.scale = "Day";
    dp.timeHeaders = [
        { groupBy: "Month", format: "MMM yyyy" },
        { groupBy: "Day", format: "d" }
    ];

    dp.contextMenu = new DayPilot.Menu({items: [
        {text:"Edit", onClick: function(args) { dp.events.edit(args.source); } },
        {text:"Delete", onClick: function(args) { 
        
        var tag = args.source.data.id.substring(0,3);

        if (tag == "occ") {
            $("#occdelete").click(); 
        }else if(tag == "adb"){
        var id = args.source.data.id.substring(3);
        var url = "<?= site_url("frontoffice/deleteAdvanceBooking") ?>";
        $.ajax({
            type: "GET",
            url: url,
            data: {id:id},
            success: function(data){
                    if (data == 1) {
                        dp.events.remove(args.source); 
                        $("#deleted").click();      
                    }
            }
        });            
        }else{
            alert(tag);
        }



        } },
    ]});

    dp.treeEnabled = true;
    dp.treePreventParentUsage = true;
    dp.eventResizeHandling = "Disabled";
    dp.resources = <?php echo $roomDataForTable; ?>

    dp.heightSpec = "Max";
    dp.height = 500;


    dp.events.list = <?php echo $bookingsmasterJson; ?>

    dp.timeRangeSelectingStartEndEnabled = true;

    // event creating
    dp.onTimeRangeSelected = function (args) {
        DayPilot.Modal.prompt("Please enter Name and Contact", "").then(function(modal) {
            dp.clearSelection();
            var name = modal.result;
            if (!name) return;
            var e = new DayPilot.Event({
                start: args.start,
                end: args.end,
                id: DayPilot.guid(),
                resource: args.resource,
                text: name
            });

        var start = args.start.toString();
        var end = args.end.toString();
        var roomno = args.resource.substring(1);
        var added_by = "<?= $this->session->userdata('logged_user'); ?>";             

        var url = "<?= site_url("frontoffice/createAdvanceBooking") ?>";
        $.ajax({
            type: "POST",
            url: url,
            data: {name: name,start:start,end:end,roomno:roomno,added_by:added_by},
            dataType: 'json',
            success: function(data){
                    if (data == 1) {
                        dp.events.add(e);
                        $("#created").click();  
                    }
            }
        });

        });
    };

        dp.onBeforeCellRender = function(args) {

            var naroom = <?php echo $narooms_json; ?>

            for (var i = 0; i < naroom.length; i++) {
                if (args.cell.resource === naroom[i]) {
                    args.cell.backColor = "#ffd5d5";
                    args.cell.html = "<div style='position:absolute;right:2px;bottom:2px;font-size:8pt;color:#666;'>N/A</div>";
                    args.cell.disabled = true;
                }
            }


    };


    dp.init();
    dp.scrollTo("2018-11-01");

    function barColor(i) {
        var colors = ["#3c78d8", "#6aa84f", "#f1c232", "#cc0000"];
        return colors[i % 4];
    }
    function barBackColor(i) {
        var colors = ["#a4c2f4", "#b6d7a8", "#ffe599", "#ea9999"];
        return colors[i % 4];
    }


</script>

  <!-- bottom -->
                </div>
            </div>
        </div>
    </div>

    <!-- /bottom -->
