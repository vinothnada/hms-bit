    
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

<style >

    .calendar_default_corner div:nth-of-type(2){
        display: none !important;
    }

</style>

<button style="display: none;" id="created" class="js-notify btn btn-sm btn-success" data-notify-type="success" data-notify-icon="fa fa-check" data-notify-message="Booking Created Successfully"></button>    
<button style="display: none;" id="latebooking" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Booking date should be a future date"></button> 
<button style="display: none;" id="deleted" class="js-notify btn btn-sm btn-success" data-notify-type="success" data-notify-icon="fa fa-check" data-notify-message="Booking Deleted Successfully"></button>
<button style="display: none;" id="occdelete" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Cannot Delete a Occupied Booking"></button>  
<button style="display: none;" id="expdelete" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Cannot Delete a expired booking"></button>    
<?php 
// Arry for list tables eith seats
$master = array();

$i = 0;
foreach ($tablesData as $item) {
    $master[$i]['name'] = 'Table '.$item->tblnum.'('.$item->seats.')';
    $master[$i]['id'] = 'Tbl'.$item->id;
    $i = $i+1;
}
$tablesDataForTable = json_encode($master);
var_dump($tablesDataForTable);

?>

<?php 


$bookingsmaster = array();

$i = 0;
foreach ($tablebookings as $item) {
    $bookingsmaster[$i]['start'] = $item->start;
    $bookingsmaster[$i]['end'] = $item->end;
    $bookingsmaster[$i]['id'] = "adb".$item->id;
    $bookingsmaster[$i]['text'] = $item->title; 
    $bookingsmaster[$i]['resource'] = 'Tbl'.$item->tbl_no;
    $i = $i+1;
}

foreach ($occupiedtbl as $item) {
    $bookingsmaster[$i]['start'] = $item->start;
    $bookingsmaster[$i]['end'] = $item->end;
    $bookingsmaster[$i]['id'] = "occ".$item->id;
    $bookingsmaster[$i]['text'] = 'Occupied'; 
    $bookingsmaster[$i]['resource'] = 'Tbl'.$item->tbl_no;
    $i = $i+1;
}

foreach ($expiredtbl as $item) {
    $bookingsmaster[$i]['start'] = $item->start;
    $bookingsmaster[$i]['end'] = $item->end;
    $bookingsmaster[$i]['id'] = "exp".$item->id;
    $bookingsmaster[$i]['text'] = 'Expired'; 
    $bookingsmaster[$i]['resource'] = 'Tbl'.$item->tbl_no;
    $i = $i+1;
}

$bookingsmasterJson = json_encode($bookingsmaster);



?>

<!-- Main Container -->
<main id="main-container">
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Table Reservations
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Home</li>
                    <li><a class="link-effect" href="">Table Reservations</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Page Content -->
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
    <h2 class="content-heading">Booking Schedular</h2>
    <div class="row">
        <div class="col-xs-12">
            Please Select a Date To Continue
            <div class="space" >
                <h5>
                    <span id="start"></span> <a href="#" onclick="picker.show(); return false;">Change</a>
                </h5>
            </div>

            <script type="text/javascript">
                var picker = new DayPilot.DatePicker({
                    target: 'start', 
                    pattern: 'yyyy-MM-dd', 
                    onTimeRangeSelected: function(args) { 
                        dp.startDate = args.start;
                        dp.update();
                    }
                });
            </script>


            <div id="dp"></div>
        </div>            
    </div>    
</div>
</div>
</main>

<script type="text/javascript">

    var dp = new DayPilot.Calendar("dp");
    dp.dayBeginsHour = 7;
    dp.dayEndsHour = 23;
    
    dp.columnWidthSpec = "Fixed",
    dp.columnWidth = 100,

    dp.viewType = "Resources";
    dp.headerLevels = 1;
    dp.columns = <?=$tablesDataForTable; ?>
    // bubble, with async loading
    dp.bubble = new DayPilot.Bubble({
        cssClassPrefix: "bubble_default",
        onLoad: function(args) {
            var ev = args.source;
            args.async = true;  // notify manually using .loaded()
            
            // simulating slow server-side load
            setTimeout(function() {
                args.html = "testing bubble for: <br>" + ev.text();
                args.loaded();
            }, 500);
        }
    });
    
    dp.contextMenu = new DayPilot.Menu({
        cssClassPrefix: "menu_default",
        items: [
        {text:"Confirm", onClick: function(args) {

            var argsId = args.source.data.id.substring(3);
            var tag = args.source.data.id.substring(0,3);

            if (tag == "occ") {
                $("#occdelete").click(); 
            }else if(tag == "exp"){
                $("#expdelete").click();
            }else if(tag == "adb"){
                var url = "<?= site_url("restaurant/confirmAdvanceBooking") ?>";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {id:argsId},
                    success: function(data){
                        if (data == 1) {
                            location.reload();      
                        }
                    }
                });             
            }

        } },        
        
        {text:"Delete", onClick: function(args) {

            var argsId = args.source.data.id.substring(3);
            var tag = args.source.data.id.substring(0,3);

            if (tag == "occ") {
                $("#occdelete").click(); 
            }else if(tag == "exp"){
                $("#expdelete").click();
            }else if(tag == "adb"){
                var url = "<?= site_url("restaurant/deleteAdvanceBooking") ?>";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {id:argsId},
                    success: function(data){
                       dp.events.remove(args.source);
                       $("#deleted").click();
                   }
               });             
            }

        } },

        ]});

    // event moving
    dp.onEventMoved = function (args) {
        dp.message("Moved: " + args.e.text());
    };
    
    // event resizing
    dp.onEventResized = function (args) {
        dp.message("Resized: " + args.e.text());
    };

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

            var today = new Date().toISOString();
            var start = args.start.toString().replace("T"," ");
            var end = args.end.toString().replace("T"," ");
            var tbl_no = args.resource.substring(3);
            var added_by = "<?= $this->session->userdata('logged_user'); ?>";     

            var startTimems = args.start.getTime();        
            var todayms = new Date().getTime();

            if (startTimems < todayms) {
                $("#latebooking").click();
            }else{
                var url = "<?= site_url("restaurant/createAdvanceBooking") ?>";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {title: name,start:start,end:end,tbl_no:tbl_no,added_by:added_by},
                    dataType: 'json',
                    success: function(data){
                        if (data == 1) {
                            dp.events.add(e);
                            $("#created").click();  
                        }
                    }
                });            
            }

        });
    };
    
    

    dp.onTimeRangeDoubleClicked = function(args) {
        alert("DoubleClick: start: " + args.start + " end: " + args.end + " resource: " + args.resource);
    };
    
    dp.onEventClick = function(args) {
        dp.message(args.e.text());  
    };

    dp.headerHeightAutoFit = true;

    dp.columnBubble = new DayPilot.Bubble({
        onLoad: function(args) {
            var c = args.source;
            args.async = true; // notify manually using .loaded()

            // simulating slow server-side load
            setTimeout(function() {
                args.html = "testing bubble for: <br>" + c.id + " date: " + c.start; // resource id in resources view
                args.loaded();
            }, 500);
        }
    });
    


    var fromPHP= <?= $bookingsmasterJson ?>;

    for (i=0; i<fromPHP.length; i++) {

        var start = fromPHP[i]['start'];
        var end = fromPHP[i]['end'];

        var tagsf = { type: "Active"};

        if (fromPHP[i]['text'] == 'Occupied') {
            tagsf = { type: "Occupied"};            
        }else if(fromPHP[i]['text'] == 'Expired'){
            tagsf = { type: "Expired"};
        }

        var e = new DayPilot.Event({
            start: new DayPilot.Date(start),
            end: new DayPilot.Date(end),
            id: fromPHP[i]['id'],
            text: fromPHP[i]['text'],
            resource: fromPHP[i]['resource'],
            moveDisabled:true,
            tags : tagsf

        });
        dp.events.add(e);

    }

        dp.onBeforeEventRender = function(args) {
        if (args.data.tags && args.data.tags.type === "Expired"){
            args.data.barColor = "red";
            args.data.rightClickDisabled = true;
        }else if (args.data.tags && args.data.tags.type === "Active"){
            args.data.barColor = "Blue";
        }else if (args.data.tags && args.data.tags.type === "Occupied"){
            args.data.barColor = "Green";
            args.data.rightClickDisabled = true;
        }
    };
    

    dp.init();
</script>

<!-- bottom -->
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var url = window.location.href;
        var filename = url.substring(url.lastIndexOf('/')+1);
        if (filename === "") filename = "index.html";
        $(".menu a[href='" + filename + "']").addClass("selected");

        $(".menu-title").click(function() {
            $(".menu-body").toggle();
            if ($(".menu-body").is(":visible")) {
                scrollTo({
                    top: pageYOffset + 100,
                    behavior: "smooth"
                });
            }
        });
    });

</script>
<script >
    

$("document").ready(function(){

    var today = new Date().toISOString();
        $.ajax({
            type: "GET",
            url: "<?=site_url("restaurant/setAdbExpiration")?>",
            data: {today:today},
            success: function(data){
                    if (data == 1) {
                        console.log('Page initiaated');  
                    }
            }
        });   
})

</script>