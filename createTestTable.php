<?php
	
//		File in DEMO folder:              createTestTable.php

{ 		//	Secure Connection Script
	
	echo '<h4>Database Error test:</h4>';
	
	$testValue = "abcdef1234";
	
	$thisSQL = "INSERT into test (testitem) VALUES ('".$testValue."')";
	echo $thisSQL."<br />";
	
	if (mysql_query($thisSQL))  {	
		echo 'used to Successfully add new testitem '.$testValue.'.<br /><br />';
	} else {
		echo '<span style="color:red; ">FAILED to add new testitem '.$testValue.'.</span><br /><br />';
		echo mysql_error();
	}	
	

}


?>