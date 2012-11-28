<?php

$mysql_user = "rlevin2";
$mysql_password = "harryhml";
$mysql_database = "rlevin2";

/* Connect to database */
mysql_connect("studentdb.gl.umbc.edu", $mysql_user, $mysql_password) or die("Can't connect to MySQL.");
mysql_select_db($mysql_database) or die("Can't connect to database.");

if(isset($_POST['RentalID']))
{
	if(!is_numeric($_POST['RentalID']))
		echo "The rental ID must be a number.<br><br>";
	
	else
	{
		$result = mysql_query("SELECT Cost, Insurance, DateReturn FROM Policy WHERE RentalID='$_POST[RentalID]'");
		
		$numRows = mysql_num_rows($result);
		
		if($numRows == 0)
			echo "Rental ID number " . $_POST['RentalID'] . " does not exist.<br><br>";
		
		else
		{
			while($row = mysql_fetch_array($result))
			{
				echo "The cost without damage fees and late fees is $" . $row['Cost'];
				
				if($row['Insurance'] == 1)
					echo ".<br><br>The customer has insurance.<br><br>";
				
				else
					echo ".<br><br>The customer doesn't have insurance.<br><br>";
				
				echo "The customer's return date is " . $row['DateReturn'];
				echo ".<br><br>";
			}
			
			if(!$deleted = mysql_query("DELETE FROM Policy WHERE RentalID='$_POST[RentalID]'"))
				echo "Could not return car.<br><br>";
			else
				echo "Successfully returned car.<br><br>";
		}
	}
}

mysql_close();

?>