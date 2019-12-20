<script>
	$('div.planList').on('click', function(event) {
		planId = event.target.id;
		showPlan(planId);
	})
</script>
<h4 class="search text-left">Matching Plans Found:</h4>
<?php
	include 'config.php';
	include 'classes/classSearchDisplay.php';
	$Search = new classSearchDisplay();
//	Array ( [Bedrooms] => 3 [Bathrooms] => 3.5 [Garages] => 1 [LivingRoom] => true [DiningRoom] => true [Study] => true [SQ] => true [Pool] => true )
	$plans = $Search->getPlans($_REQUEST);
	echo "<br>searchFirst:<br>";
	print_r($plans);
	echo "<br>";
	$Search->showPlans($plans);
?>
