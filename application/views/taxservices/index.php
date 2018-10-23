
<!-- Main Container -->
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-7">
				<h1 class="page-heading">
					Tax and Services 
				</h1>
			</div>
			<div class="col-sm-5 text-right hidden-xs">
				<ol class="breadcrumb push-10-t">
					<li><a href="<?= HOMEURL; ?>">Home</a></li>
					<li><a class="link-effect" href="#">Tax and Services</a></li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END Page Header -->
	<!-- Page Content -->
	<div class="content">
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

		<div class="row">
			<div class="col-sm-6 col-lg-3" style="margin-left: 12%">
				<a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
					<div class="block-content block-content-full">
						<div class="h1 font-w700"><?= $taxArray[0]; ?><span class="h2 text-muted">&nbsp;%</span></div>
						<div class="h6 text-muted text-uppercase push-5-t">On total bill</div>
					</div>
					<div class="block-content block-content-full block-content-mini bg-success text-white">
						TAX Percentage
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
					<div class="block-content block-content-full">
						<div class="h1 font-w700"><?= $restaurantServicesArray[0]; ?><span class="h2 text-muted">&nbsp;%</span></div>
						<div class="h6 text-muted text-uppercase push-5-t">On total bill</div>
					</div>
					<div class="block-content block-content-full block-content-mini bg-danger text-white">
						Restaurant Service Charge
					</div>
				</a>
			</div>
			<div class="col-sm-6 col-lg-3">
				<a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
					<div class="block-content block-content-full">
						<div class="h1 font-w700"><?= $barServicesArray[0]; ?><span class="h2 text-muted">&nbsp;%</span></div>
						<div class="h6 text-muted text-uppercase push-5-t">On total bill</div>
					</div>
					<div class="block-content block-content-full block-content-mini bg-warning text-white">
						Bar Service Charge
					</div>
				</a>
			</div>						

		</div>
	</div>

	<div class="content">
		<div class="block">
			<div class="block-header">
				<h5>Update History </h5>
			</div>
			<div class="block-content">
				<table class="table table-bordered table-striped js-dataTable-full">
					<thead>
						<tr>
							<th>Category</th>
							<th>Type</th>
							<th>Value</th>
							<th>Updated by</th>
							<th>Updated Date</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($taxservicesdata as $items) { ?>
						<tr>
							<td><?= $items->name; ?></td>
							<td><?= $items->type; ?></td>
							<td><?= $items->value; ?>&nbsp;%</td>
							<td><?= $items->modifiedBy; ?></td>
							<td><?= $items->modifiedDate; ?></td>
						</tr>
						<?php } ?>  
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>