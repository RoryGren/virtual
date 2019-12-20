<?php
//	include 'config.php';
	include 'classes/classSearch.php';
	$Search = new classSearch();
	$zoneList = $Search->getzones();
	$zoneCounter = 0;
//	echo "<br><br><br><br><br>" . $_SERVER['SERVER_NAME'] . "<br>";
//	echo "<br><br><br><br><br>" . $_SERVER['HTTP_HOST'] . "<br>";
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			include 'includes/head.php';
		?>
	</head>
    <body class="pages">
		<script>
			$(document).ready(function() {
//				$(document).ready(doTransition(''));
				setActiveMenu('search');
			})
		</script>
		<?php include 'navBarTop.php'; ?>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col col-md-2 search"></div>
				<div class="col col-md-10">
					<h3 class="text-center">Design Your Dream Home</h3>
				</div>
			</div>
			<div class="row">
				<div class="col col-sm-1"></div>
				<div class="col col-sm-2 search">
					<h4 class="search">Step 1: Find the floor-plan!</h4>
					<form id="frmSearch" class="search">

						<div class="form-group">
							<label for="Bedrooms" class="search">How many Bedrooms would you like?</label>
							<input type="number" class="form-control" id="Bedrooms" name="Bedrooms" onchange="doSearch();" autofocus>
						</div>

						<div class="form-group">
							<label for="Bathrooms" class="search">How many Bathrooms would you like?</label>
							<input type="number" class="form-control" id="Bathrooms" name="Bathrooms" placeholder="1, 1.5, 2, 2.5, ..." onchange="doSearch();">
						</div>
						<div class="form-group">
							<label for="Garages" class="search">How many Garages would you like?</label>
							<input type="number" class="form-control" id="Garages" name="Garages" value="0" onchange="doSearch();">
						</div>
						<div class="form-group">
							<table class="table table-bordered">
								<tbody  id="tblSelection">
								<?php
									while ($zoneCounter < 5) {
										if (isset($zoneList[$zoneCounter])){
											echo "<tr class='form-group form-inline'>";
											echo "<td><label for='" . $zoneList[$zoneCounter]['zoneFieldName'] . "' class='search'>"
													. $zoneList[$zoneCounter]['zoneDesc'] . " </label></td>";
											echo "<td><input type='checkbox' class='form-control' "
													. "id='"    . $zoneList[$zoneCounter]['zoneId'] . "' "
													. "name='"  . $zoneList[$zoneCounter]['zoneFieldName'] . "' "
//													. "value='roomListId_" . $zoneList[$zoneCounter]['zoneId'] . "' "
													. "onchange='doSearch();'></td>";
											echo "</tr>";
											$zoneCounter ++;
										}
									}
								?>
									<div id="extraRooms">

									</div>
								</tbody>
							</table>
						</div>
						<div class="btn-group ">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Other Rooms
							</button>
							<ul class="dropdown-menu pointer" aria-labelledby="dropdownMenuButton">
								<?php
								foreach ($zoneList as $key => $value) {
									if ($key > 4) {
										echo "<li><a class='dropdown-item' onclick='addItem(\"" . $value['zoneDesc'] . "\", \"" . $value['zoneId'] . "\");'>" . $value['zoneDesc'] . "</a></li>";
									}
								}
								?>
							</ul>
						</div>
					</form>
				</div>
				<div class="col col-sm-2 search text-left">
					<div id="searchResults">
						
					</div>
				</div>
				<div class="col col-sm-3 planSearch" id="planSearch">
						<!--<br><br><br><br>-->
						<!--<span class="loading fa fa-spinner fa-pulse"></span>-->
				</div>
				<div class="col col-sm-1"></div>
			</div>
		</div>
	</body>
</html>
