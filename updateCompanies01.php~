<?php
/*

*	File:		updateCompanies01.php
*	By:			Sandeep Gupta
*	Date:		5/19/2015
*
*	This script UPDATEs values of the field Country in table tCompany
*	to 'United Kingdom' WHERE they have the value 'UK'
*
*=====================================
*/


{ // Connect and Test MySQL and specific DB (return $dbSuccess = T/F)
				
			$hostname = "localhost";
			$username = "root";
			$password = "";
			
			$databaseName = "alphacrm";

			$dbConnected = @mysql_connect($hostname, $username, $password);
			$dbSelected = @mysql_select_db($databaseName,$dbConnected);

			$dbSuccess = true;
			if ($dbConnected) {
				if (!$dbSelected) {
					echo "DB connection FAILED<br /><br />";
					$dbSuccess = false;
				}		
			} else {
				echo "MySQL connection FAILED<br /><br />";
				$dbSuccess = false;
			}
}  

//	 Execute code ONLY if connections were successful 	
if ($dbSuccess) {
	
	
	// SQL to change country value from UK to United Kingdom 
	$company_SQLupdate = "UPDATE tCompany SET ";
	
	$company_SQLupdate .= "COUNTRY = 'United Kingdom' ";
	
	$company_SQLupdate .= "WHERE COUNTRY = 'UK' "; 
	
	if (mysql_query($company_SQLupdate))  {	
		echo "UPDATE tCompany.COUNTRY - SUCCESSFUL.<br /><br />";
	} else {
		echo "UPDATE tCompany.COUNTRY - FAILED.<br /><br />";
	}
			
	
			
}




?>