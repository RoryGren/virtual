<?php
include 'classes/classSearch.php';
/**
 * Description of classSearchDisplay
 *
 * @author rory
 */
class classSearchDisplay extends classSearch {

	private $PlanList;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function returnzones() {
		return $this->getzones();
	}

	public function returnSelectOptions($Type) {
		$ValueOptionList = '';
		switch ($Type) {
			case 'Styles':
				$QRY = $this->getStyleList();
				break;
			default:
				break;
		}
		while ($ValueOptions = mysqli_fetch_array($QRY)) {
			$ValueOptionList .= "<option value='" . $ValueOptions[0] . "'>" . $ValueOptions[1] . "</option>";
		}
		return $ValueOptionList;
	}
	
	public function showPlans($plans) {
		$this->PlanList = $this->getPlanList();
		$PlanList = '';
		if (count($plans) > 0) {
			foreach ($plans as $key => $value) {
				$PlanList .= "<div class='btn btn-block planList' id='" . $value . "'>"
						. $this->PlanList[$value]['Description']
						. "<input type='hidden' id='plan$value' value='" . $this->PlanList[$value]['Code'] . "'>"
						. "</div>";
			}
			echo $PlanList;
		}
		else {
			echo "<p class='text-center text-emphasise'>Sorry.<br>No plans match your search criteria.<br>Please modify your search criteria.</p>";
		}
	}

	public function getImageList($planId) {
		$results = $this->fetchPlanImages($planId);
		$planData = mysqli_fetch_assoc($results);
		$planCode = $planData['Code'];
		$ImageList = glob('images/' . $planCode . '*.jpg');
		return $ImageList;
//		echo "PlanCode: $planCode<br>";
//		echo 'images/' . $planCode . "<br>";
//		print_r($ImageList);
	}
}

?>
