<?php

$mysql_user = "rlevin2";
$mysql_password = "harryhml";
$mysql_database = "rlevin2";

/* Connect to database */
mysql_connect("studentdb.gl.umbc.edu", $mysql_user, $mysql_password) or die("Can't connect to MySQL.");
mysql_select_db($mysql_database) or die("Can't connect to database.");

echo "Please enter the following information and click 'Submit' to rent a vehicle.<br><br>";

if(isset($_POST['VehicleID']) && isset($_POST['CustomerID']) && isset($_POST['Cost']) && isset($_POST['DateRent']) && isset($_POST['DateReturn']) && isset($_POST['Insurance']))
{
	if(!is_numeric($_POST['VehicleID']) || !is_numeric($_POST['CustomerID']) || !is_numeric($_POST['Cost']))
		echo "Not valid input.<br><br>";
	
	else if(!is_string($_POST['DateRent']) || !is_string($_POST['DateReturn']))
		echo "Not valid input.<br><br>";
	
	else if(!preg_match("#([0-9]+){4}\-([0-9]+){2}\-([0-9]+){2}#", $_POST['DateRent']) && !preg_match("#([0-9]+){4}\-([0-9]+){2}\-([0-9]+){2}#", $_POST['DateReturn']))
		echo "Not valid input.<br><br>";
	
	else if(strlen(substr($_POST['Cost'], strpos($_POST['Cost'], '.') + 1)) != 2)
		echo "Not valid input yup.<br><br>";
	
	else if(!$insert = mysql_query("INSERT INTO Policy (VehicleID, CustomerID, Cost, DateRent, DateReturn, Insurance) VALUES ('$_POST[VehicleID]', '$_POST[CustomerID]', '$_POST[Cost]', '$_POST[DateRent]', '$_POST[DateReturn]', '$_POST[Insurance]')"))
		echo "Can't submit information.<br><br>";
	
	else
	{
		echo "Succesfully rented car. Your rental ID number is " . mysql_insert_id();
		echo ".<br><br>";
	}
}

else
	echo "You must fill in all the information.<br><br>";

mysql_close();

?>

<form name="input" action="" method="POST">

Vehicle ID: <input type="text" name="VehicleID"><br>
Customer ID: <input type="text" name="CustomerID"><br>
Cost (##.##): <input type="text" name="Cost"><br>
Date Rented (YYYY-MM-DD): <input type="text" name="DateRent"><br>
Date Returned (YYYY-MM-DD): <input type="text" name="DateReturn"><br>
Insurance?<br>
<input type="radio" name="Insurance" value=1>Yes<br>
<input type="radio" name="Insurance" value=0>No<br><br>
<input type="submit" value="Submit">
