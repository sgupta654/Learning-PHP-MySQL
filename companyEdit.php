<?php
/*

*	File:			companyEdit.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using a dropdown
* 		to select which company to edit.
*
*
*=====================================
*/

{ 		//	Secure Connection Script
		include('../../htconfig/dbConfig.php'); 
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} else {
				echo "DB Selection FAILed";
			}
		} else {
				echo "MySQL Connection FAILed";
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
	$postFormName = "companyEditForm";
	include_once('../includes/coDropDown.php');

}

echo "<br /><hr /><br />";


echo '<a href="../index.php">Quit - to homepage</a>';


?>