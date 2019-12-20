<?php
	$PlanId = $_POST['planCodeId'];
	include 'config.php';
	include 'classes/classSearchDisplay.php';
	$Search = new classSearchDisplay();
	$zoneList = $Search->returnzones();
	$zoneCounter = 0;
	$StyleSelect = $Search->returnSelectOptions('Styles');
	include 'classes/classPlanDisplay.php';
	$Plan = new classPlanDisplay();
	$tableBody = $Plan->getPlanRooms($PlanId);
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Virtual Architect</title>

		<!-- Boostrap links -->
		<link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Website CSS -->
		<link href="style/virtualArchitect.min.css?d=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css"/>
		<link href="style/vaNav.min.css" rel="stylesheet" type="text/css"/>

		<!-- Website JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="scripts/virtualArchitect.min.js" type="text/javascript"></script>
		<script src="scripts/va-core.min.js" type="text/javascript"></script>
	</head>
    <body class="pages">
		<?php include 'navBarTop.php'; ?>
		<div class="home pages" id="home"><a id="home"></a>
			<div class="container-fluid" style="margin-top: 70px;">
				<div class="row">
					<div class="col col-md-2 search">
						<!--Zones List-->
						<?php 
//							print_r($_REQUEST); 
						?>

					</div>
					<div class="col col-md-8">
						<p><b>Enter Your Anticipated Budget: (Construction costs only. Excluding VAT.)</b> R<input type="number" id="txtBudget" placeholder="2500000"></p>
						<table class="table table-bordered">
							<thead>
								<tr><th colspan="5">Planning Chart</th></tr>
								<tr><th colspan="5" style="border-bottom: none;">Please Select:</th></tr>
								<tr>
									<td style="border: none; border-bottom: #DDDDDD solid 2px;"><select id="selLayout">
											<option value="NULL"> House Layout </option>
											<option value="Single Storey">Single Storey</option>
											<option value="Double Storey">Double Storey</option>
											<option value="Split Level">Split Level</option>
										</select>
									</td>
									<td style="border: none; border-bottom: #DDDDDD solid 2px;"><select id="selStyle">
											<option value="NULL">Select Style </option>
											<?php echo $StyleSelect; ?>
										</select>
									</td>
									<td style="border: none; border-bottom: #DDDDDD solid 2px;"><select id="selKitchenPlan">
											<option value="NULL"> Kitchen Layout </option>
											<option value="Open">Open Plan</option>
											<option value="Conventional">Conventional</option>
										</select>
									</td>
									<td style="border: none; border-bottom: #DDDDDD solid 2px;"><select id="selFinish">
											<option value="NULL"> Finishes Level </option>
											<option value="7500">Economy</option>
											<option value="10000">Standard</option>
											<option value="15000">Luxury</option>
										</select>
									</td>
									<td style="border: none; border-bottom: #DDDDDD solid 2px;"></td>
								</tr>
								<tr style="border-top: 1px !important;">
									<th>Description</th>
									<th>Approx. Length</th>
									<th>Approx. Width</th>
									<th>sq/m</th>
									<th>Notes</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $tableBody; ?>
							</tbody>
						</table>
					</div>
					<div class="col col-md-2 search"></div>
				</div>
			</div>
		</div>
		
	</body>
</html>