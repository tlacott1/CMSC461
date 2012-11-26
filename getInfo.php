<!DOCTYPE html>
<html>

<head>
<title>Vehicle Rental Management System</title>
<style type="text/css">

#header
{
	background-color:lightblue;
	height:75px;
	font-family:cursive;
}

h1
{
	margin-bottom:0;
	margin-top:0;
	text-align:center;
	color:cornsilk;
	font-size:60px;
}

#menu
{
	background-color:lightblue;
	height:500px;
	width:200px;
	float:left;
	font-size:20px;
	color:cornsilk;
	font-family:cursive
}

#content
{
	background-color:whitesmoke;
	height:500px;
	float:center;
	color:darkblue;
	font-size:20px;
	font-family:bimini;
}

#footer
{
	background-color:lightblue;
	clear:both;
	text-align:center;
	color:cornsilk;
	font-family:cursive;
}

.menuButtons:link, .menuButtons:visited
{
	display:block;
	color:cornsilk;
	width:195px;
	height:26px;
	padding:0px;
	margin:5px;
	text-decoration:none;
}

.menuButtons:hover, .menuButtons:active
{
	background-color:black;
}

</style>
</head>

<body bgcolor="#FFFFFF" style="margin:0;">

<div id="container">

<div id="header">
<h1><b>Return</b></h1>
</div>

<div id="menu" >

<br />

<a class="menuButtons" href="https://userpages.umbc.edu/~nreed2/461/Rent.php">Rent</a>

<br />

<a class="menuButtons" href="https://userpages.umbc.edu/~nreed2/461/Return.php">Return</a>

<br />

<a class="menuButtons" href="https://userpages.umbc.edu/~nreed2/461/Add.php">Add</a>

<br />

<a class="menuButtons" href="https://userpages.umbc.edu/~nreed2/461/Edit.php">Edit</a>

<br />

<a class="menuButtons" href="https://userpages.umbc.edu/~nreed2/461/Delete.php">Delete</a>

<br />

<a class="menuButtons" href="https://userpages.umbc.edu/~nreed2/461/Search.php">Search</a>

<br />

</div>

<div id="content">

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

<form action="Return.php">
<input type="submit" value="Return Another Car">


</form>


</div>

<div id="footer">
By Neva Reed, Ross Levin, Tim LaCotti</div>
</div>

</body>

</html>