<?php
include 'classes/classPlan.php';

/**
 * Description of classPlanDisplay
 *
 * @author rory
 */
class classPlanDisplay extends classPlan {

	public function __construct() {
		parent::__construct();
	}

	public function getPlanRooms($PlanId) {
		if (is_numeric($PlanId)) {
			$this->findPlanRooms($PlanId);
			$tableBody = '';
			foreach ($this->PlanRoomDataList as $RoomId => $RoomData) {
				$tableBody .= "<tr>";
				$tableBody .= "<td>" . $RoomData['zoneDesc'] . "</td>";
				$tableBody .= "<td>" . $RoomData['Length'] . "</td>";
				$tableBody .= "<td>" . $RoomData['Breadth'] . "</td>";
				$tableBody .= "<td>" . ($RoomData['Length'] * $RoomData['Breadth']) . "</td>";
				$tableBody .= "<td><input type='text' id='txt$RoomId'</td>";
				$tableBody .= "</tr>";
			}
			return $tableBody;
		}
	}
	
}

?>
