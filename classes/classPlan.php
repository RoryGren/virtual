<?php
/**
 * Description of classPlan
 *
 * @author rory
 */
class classPlan extends MYSQLi {

	protected $PlanRoomIdList;
	protected $PlanRoomDataList;

	public function __construct() {
		include_once INC;
		$this->connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
	}
	
	protected function findPlanRooms($PlanId) {
		// =================================
		// Get Room ID list from Plan record
		// =================================
		$SQL = "SELECT `RoomIdList` FROM `Plan` WHERE `PlanId` = $PlanId";
		echo $SQL;
		$query = $this->query($SQL);
		$row = mysqli_fetch_assoc($query);
		$this->PlanRoomIdList = $row['RoomIdList'];
		mysqli_free_result($query);
		// ==========================================
		// Get array of Rooms with length and breadth
		// ==========================================
		$RoomIdArray = explode(',', $this->PlanRoomIdList);
		$SQL = "SELECT `zoneId`, `zoneDesc`, `zoneCategoryId`, `Length`, `Breadth` FROM `Zone` WHERE `zoneId` in ($this->PlanRoomIdList)";
		echo $SQL;
		$query = $this->query($SQL);
		$RoomData = array();
		$SelectedRoomData = array();
		while ($row = mysqli_fetch_assoc($query)) {
			array_push($RoomData, $row);
		}
		mysqli_free_result($query);
		// ===============================================
		// Import room data into room list by searchableId
		// ===============================================
		foreach ($RoomIdArray as $key => $zoneId) {
			foreach ($RoomData as $dataKey => $data) {
				if ($data['zoneId'] == $zoneId) {
					$SelectedRoomData[$key] = $data;
				}
			}
		}
		$this->PlanRoomDataList = $SelectedRoomData;
	}
}

?>


