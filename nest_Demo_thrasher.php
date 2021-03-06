<?php
/*

*	File:			nest_Demo_thrasher.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demonstrates in-elegant database thrashing
* 		with a nested processing loop
*		
*
*=========================================================================
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

	{  //   Style declarations
			$trOdd = 'style = "background-color: #BFFFCF;"';
			$trEven = 'style = "background-color: #FCCDFF;"';
			
			$textFont = 'style = " font-family: arial, helvetica, sans-serif; "';
			$textRed = 'style = " font-family: arial, helvetica, sans-serif; color:maroon; "';
			
			$indent50 = 'style = " margin-left: 50; "';
			$indent100 = 'style = " margin-left: 100; "';
			
	//   END: Style declarations	
	}
	
	echo '<h1>All Persons by Company</h1>';
	
	
	//		Company SQL
	$tCompany_SQLselect = "SELECT tCompany.ID AS companyID, ";		
	$tCompany_SQLselect .= "tCompany.preName, tCompany.Name, tCompany.RegType ";
	$tCompany_SQLselect .= "FROM tCompany ";
	
	$tCompany_SQLselect .= "ORDER BY tCompany.Name, tCompany.preName, tCompany.ID ";
	
	$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);
	
	{	//	while  more company records
	
			while ($rowCompany = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
				
				$CompanyID = $rowCompany['companyID'];
				$CompanypreName = $rowCompany['preName'];
				$CompanyName = $rowCompany['Name'];
				$CompanyRegType = $rowCompany['RegType'];
			 
				$CompanyFullName = trim($CompanypreName." ".$CompanyName." ".$CompanyRegType);
				echo '<h2 '.$indent50.'>'.$CompanyFullName.'</h2>';
				
				echo '<div '.$indent100.'>';
		   	echo "<table border='1'>";
				echo "<tr>";
				
					echo "<td>#</td>";
					echo "<td>Salutation</td>";
					echo "<td>FirstName</td>";
					echo "<td>LastName</td>";
					echo "<td>Telephone</td>";
					echo "<td>eMail</td>";
			
				echo "</tr>";  
				
				{	//	Person Table for companyID
					
						{//		Person SQL
							$tPerson_SQLselect = "SELECT  ";
							$tPerson_SQLselect .= "tPerson.ID AS personID, ";	
							$tPerson_SQLselect .= "tPerson.Salutation, ";	
							$tPerson_SQLselect .= "tPerson.FirstName, tPerson.LastName ";	
							$tPerson_SQLselect .= "FROM tPerson ";
							$tPerson_SQLselect .= "WHERE tPerson.CompanyID = ".$CompanyID." ";		
							$tPerson_SQLselect .= "ORDER BY tPerson.LastName, tPerson.FirstName ";
		
							$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect);
						//		end person SQL
						}
						
						$currentCompanyID = -1;
						$indx = 0;
						echo '<div '.$textFont.'>';
					
						{	//	while  more person records
								while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
									
									$personID = $row['personID'];
									$Salutation = $row['Salutation'];
									$FirstName = $row['FirstName'];
									$LastName = $row['LastName'];
									$Telephone = $row['Telephone'];
									$eMail = $row['eMail'];
						
									{	//		Create and format a row for each person
									if (($indx 2) == 1) {$rowClass = $trOdd; } else { $rowClass = $trEven; }
									echo '<tr '.$rowClass.'>';
						 			
										echo "<td>".$personID."&nbsp;</td>";       //  this is NOT  tPerson.ID
										echo "<td>".$Salutation."&nbsp;</td>";
										echo "<td>".$FirstName."&nbsp;</td>";
										echo "<td>".$LastName."&nbsp;</td>";
										echo "<td>".$Telephone."&nbsp;</td>";
										echo "<td>".$eMail."&nbsp;</td>";
								
									echo "</tr>";
									//		END:  Create and format a row for each person
									}	
									$indx++;
								}
								
						//		END:   //	while  more person records
						}		
				//	END: Person Table for companyID			
				}				
				
				echo "</table>";
				echo '</div>';
			}
	//	END: while more company records
	}  
	

	echo '</div>';

	mysql_free_result($tPerson_SQLselect_Query);		
}

?>