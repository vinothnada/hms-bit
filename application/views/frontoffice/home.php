<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h1 class="page-heading">
					Frontoffice 
				</h1>
			</div>
			<div class="col-sm-5 text-right hidden-xs">
				<ol class="breadcrumb push-10-t">
					<li>Frontoffice</li>
					<li><a class="link-effect" href="">Home</a></li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END Page Header -->
    
	<!-- Notifications -->
    <button style="display: none;" id="maintananceerror" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Sorry,This room is under Maintanance"></button>
    <button style="display: none;" id="cleaningerror" class="js-notify btn btn-sm btn-danger" data-notify-type="danger" data-notify-icon="fa fa-times" data-notify-message="Sorry,This room is under a Housekeeping Activity"></button> 


	<!-- Page Content -->
	<div class="content">
		<!-- User Widgets -->
		<h2 class="content-heading">Rooms Status</h2>
		<!-- User Simple Widgets -->
		<div class="row">
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-success">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Available</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-primary">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Occupied</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-primary bg-danger">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Maintenance</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-warning">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Housekeeping</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-flat">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Total</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-info">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Exp Checkouts</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-city">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Arrivals Today</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>	
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3" href="javascript:void(0)">
					<div class="block-content block-content-full clearfix bg-modern">
						<div class="pull-left push-10-t">
							<div class="font-w600 push-5">Checkouts Today</div>
						</div>
						<div class="pull-right push-10-t">
							<div class="font-w600 push-5">10</div>
						</div>
					</div>
				</a>
			</div>																		
		</div>

		<?php foreach ($floortypes as $item) { ?>
		<div class="row">			
			<div class="col-sm-12">
				<div class="block block-themed">                
					<div class="block-header bg-muted">
						<ul class="block-options">
							<li>
								<button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
							</li>
						</ul>
						<h3 class="block-title"><?= $item->name ?></h3>
					</div>
					<div class="block-content">
						<div class="row">
							<?php foreach ($roomsdata as $item2) { ?>
							<?php if ($item2->name == $item->name) { ?>
							<div class="col-sm-2">
									<?php $classstring = "block-content block-content-full bg-"; ?>
									<?php if ($item2->availibility == "Available") {
										$classstring .= "success";
										$linkUrl = site_url("frontoffice/newBooking?id=$item2->roomno");
										$rid="availableRoom";
									}elseif ($item2->availibility == "Occupied") {
										$classstring .= "primary";
										$linkUrl = site_url("frontoffice/occupiedRoom?id=$item2->roomno");
										$rid="occupiedRoom";										
									}elseif ($item2->availibility == "Maintanance") {
										$classstring .= "danger";
										$linkUrl = "#";
										$rid="maintananceRoom";										
									}elseif ($item2->availibility == "Housekeeping") {
										$classstring .= "info";
										$linkUrl = "#";
										$rid="cleaningRoom";										
									} ?>                            
								<a class="block block-link-hover1 text-center" id="<?=$rid?>" href="<?= $linkUrl; ?>">
									<div class="block-content border block-content-full block-content-mini" >
										<strong>Room#<?=$item2->roomno;?></strong> 
									</div>
									<div class="<?= $classstring;?>">
										<i class="fa fa-hotel fa-4x text-white"></i>
									</div>
									<div class="block-content border block-content-full block-content-mini">
										<strong><?=str_replace("ROOM", "", $item2->type);?></strong><br>
										<strong>LKR <?=$item2->tariff;?></strong>
									</div>
								</a>
							</div> 
							<?php } ?>
							<?php } ?>                        
						</div>
					</div>                    
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</main>
<script >
	
	$("#maintananceRoom").click(function(){
		$("#maintananceerror").click()
	})

	$("#cleaningRoom").click(function(){
		$("#cleaningerror").click()
	})

		
</script>