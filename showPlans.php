<?php
	$planId = filter_input(INPUT_GET, 'planId');
	include 'config.php';
	include 'classes/classSearchDisplay.php';
	$Search     = new classSearchDisplay();
	$ImageList  = $Search->getImageList($planId);
//	print_r($ImageList);
	$TopImage   = '';
	foreach ($ImageList as $Image) {
		$ImageName = substr($Image, 0, strrpos($Image, "."));
//		echo $Image . "<br>";
//		echo "$ImageName<br>";
		if (substr($ImageName, -2) === 'bp') {
			$TopImage = $Image;
		}
	}
//	print_r($ImageList);
//	echo $TopImage . "<br>";
	echo "<div class='text-right planCode'>Plan code: <span id='planCode'></span></div>";
	echo "<div id='showBig'>";
	echo "<img src='$TopImage' alt='' class='showBig img img-responsive'>";
	echo "</div>";
	echo "<div class='thumbs'>";
	foreach ($ImageList as $Image) {
		echo "<img src='$Image' onclick='swapImages(\"$Image\");'>";
	}
	echo "</div>";
	
	
?>
<div class="row">
	<div class="col col-sm-10"></div>
	<div class="col col-sm-2" style="padding-top: 5px;">
		<form action="budget.php" method="POST">
			<input type="hidden" name="planCodeId" value="<?php echo $planId; ?>">
			<input type="submit" class="btn btn-small btn-primary">
		</form>
		<!--<button class="btn btn-small btn-primary" onclick="doBudget();">Select this Plan</button>-->
	</div>
</div>
