<?php
if ($_SERVER['SERVER_NAME'] === 'localhost') {
// ===================================================================
// ===== Comment these out for production. Debug Error Messages. =====
// ===================================================================
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
// ===================================================================
}
// ======================================================
// =====> Production Config constants and settings <=====
// ======================================================
date_default_timezone_set('Africa/Johannesburg');

// ================================
// =====> PHP Root Constants <=====
// ================================

define('WEB_ROOT', dirname(__FILE__) . '/');	// /Users/rory/Sites/ii-eLearning/public_html/
define('BASE', dirname(WEB_ROOT));				// /Users/rory/Sites/ii-eLearning
define('DOM', $_SERVER['SERVER_NAME']);			// localhost

//echo "<br><br><br>" . BASE;

// ========================================
/* File containing DB connection details */
// ========================================

//$Pos = strrpos(BASE, '/');
//$Base = substr(BASE, 0, $Pos);
//$Conn = '/v_includes/conn.inc.php';
define('INC', BASE . '/v-includes/conn.inc.php');

//echo "<br><br><br>INC: " . INC;

//define('DBCONN', BASE.'/virtual_includes/classDB.php');
//if ($_SERVER['SERVER_NAME'] === 'localhost') {
//	define('INC', BASE . $Conn);
//	define('DBCONN', BASE.'/virtual_includes/classDB.php');
//}
//else {
//	define('INC', BASE . $Conn);
//	define('DBCONN', BASE.'/virtual_includes/classDB.php');
//}
//	echo "<br>INC: " . INC . "<br>";
//	echo "<br>DBCONN: " . DBCONN . "<br>";

// =================================
// =====> HTML Root Constants <=====
// =================================

?>
