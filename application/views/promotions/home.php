<main id="main-container">
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h1 class="page-heading">
					Offers and Promotions 
				</h1>
			</div>
			<div class="col-sm-5 text-right hidden-xs">
				<ol class="breadcrumb push-10-t">
					<li>Home</li>
					<li><a class="link-effect" href="">Offers and Promotions</a></li>
				</ol>
			</div>
		</div>
	</div>

	<div class="content">
        <div class="col-xs-6">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Happy Hours</h3>
                </div>
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-xs-4">
                            <br>
                            <label  class="css-input switch switch-success">
                                <input type="checkbox" id="hhbox"><span></span> <span id="label1">Active</span>
                            </label>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Start Time</label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>End Time</label>
                                <div class='input-group date' id='datetimepicker2'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>                                        

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">All day Offers</h3>
                </div>
                <div class="block-content">
                    <div class="row items-push">
                        <div class="col-xs-4">
                            <br>
                            <label class="css-input switch switch-primary">
                                <input type="checkbox" id="allbox"><span></span> <span id="label2">Active</span>
                            </label>
                        </div>
                        <div class="col-xs-8">
                            <div class="form-group">
                                <label class="control-label" for="example-daterange1">Date Range</label>
                                <div class="input-daterange input-group" data-date-format="mm/dd/yyyy">
                                    <input class="form-control" type="text" id="example-daterange1" name="example-daterange1" placeholder="From">
                                    <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                    <input class="form-control" type="text" id="example-daterange2" name="example-daterange2" placeholder="To">
                                </div>
                            </div>
                        </div>                                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

    $("document").ready(function(){
            $('#datetimepicker1').datetimepicker({
                format: 'HH:mm'
            });

            $('#datetimepicker2').datetimepicker({
                format: 'HH:mm'
            });        
    })

    $("#hhbox").change(function () {
        if (this.checked) {
            $("#label1").html("Active");
        }else{
            $("#label1").html("Inactive");
        }
    });


    $("#allbox").change(function () {
        if (this.checked) {
            $("#label2").html("Active");
        }else{
            $("#label2").html("Inactive");
        }
    });

    </script>
</main>