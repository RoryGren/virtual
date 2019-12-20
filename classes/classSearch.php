<?php
//include DBCONN;
/**
 * Description of classSearch
 *
 * @author rory
 */
//class classSearch extends classDB {
class classSearch extends mysqli {

	private $zone;
	private $PlanMedia;
	private $Plans;

	public function __construct() {
		include INC;
		$this->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
		$this->fetchzones();
	}
	
	public function getzones() {
		return $this->zone;
	}

	public function getPlans($searchParams) {
		$list = $this->fetchPlans($searchParams);
		return $list;
	}
	
	public function getPlanList() {
		return $this->Plans;
	}

	private function fetchzones() {
		$SQL = 'SELECT `zoneId`, `zoneDesc`, `zoneFieldName`, `ViewBy`, `isDefault` 
				FROM `Zone`
				WHERE `isDefault` = 0 
				ORDER BY `zoneDesc` -- `ViewBy`';
		$query = $this->query($SQL);
		while ($row = mysqli_fetch_assoc($query)) {
			$this->zone[] = $row;
		}
	}

	private function fetchPlans($searchParams) {
//		echo "<br>Fetch Plans: <br>";
		$Bedrooms   = $searchParams['Bedrooms'] . "<br>";
		$Bathrooms  = $searchParams['Bathrooms'] . "<br>";
		$Garages    = $searchParams['Garages'] . "<br>";
		$zoneIdList = json_decode($searchParams['Zones']);
		var_dump($searchParams['Zones']);
		echo "<br>";
		var_dump($zoneIdList);
		echo "<br>";
		
		$SQL = "SELECT `PlanId`, `PlanStyleId`, `Code`, `Description`, `RoomIdList`, `TotalArea` FROM `Plan` WHERE ";
		foreach ($searchParams as $key => $value) {
			if ($value === 'true') {$value = 1;}
			elseif ($value === 'false') {$value = 0;}
			if ($zoneIdList) {
//				var_dump($zoneIdList);
				echo "There is a Zone...<br>";
//				foreach
			}
			if ($value > 0 && $key !== 'PHPSESSID' && $key !== '_ga') {
				if (substr($SQL, -6) != 'WHERE ') {
					$SQL .= " AND ";
				}
				$SQL .= "`$key` = '$value' ";
			}
		}
		echo "<br>$SQL<br>";
		$query = $this->query($SQL);
		while ($row = mysqli_fetch_assoc($query)) {
			$this->Plans[$row['PlanId']] = $row;
			$this->PlanMedia[] = $row['PlanId'];
		}
//		print_r($this->PlanMedia);
		return $this->PlanMedia;
	}
	
	protected function fetchPlanImages($planId) {
		$SQL = "SELECT * FROM `Plan` WHERE `PlanId` = $planId";
		$QRY = $this->query($SQL);
		return $QRY;
	}
	
	protected function getStyleList() {
		$result = '';
		$SQL = "SELECT `StyleId`, `StyleDesc` FROM `Style`";
		$QRY = $this->query($SQL);
		return $QRY;
	}
}

?>
