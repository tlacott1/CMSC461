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
	width:200px;
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
<h1><b>Add</b></h1>
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

	$make = strtoupper($_POST['make']);
	$model = strtoupper($_POST['model']);
	$class = strtoupper($_POST['class']);
	$plateNumber = strtoupper($_POST['plateNumber']);
	$exists = 0;
	$con = @mysql_connect("studentdb.gl.umbc.edu", "rlevin2", "harryhml");
	if(!$con)
	{
		die('could not connect: ' . @mysql_error());
	}

	@mysql_select_db("rlevin2", $con);
	
	$result = @mysql_query("SELECT * FROM Vehicle WHERE PlateNumber='$plateNumber'");
	While($row = @mysql_fetch_array($result)){
		if($row['PlateNumber'] = plateNumber){
			echo "A vehicle with this license plate number already exists<br /><br />";
			echo "Vehicle not added";
			$exists = 1;
		}
	}
	if($exists == 0){
		@mysql_query("INSERT INTO Vehicle (PlateNumber, Make, Model, Class)
		VALUES ('$plateNumber', 
		'$make',
		'$model',
		'$class' )");
	
		$result = @mysql_query("SELECT * FROM Vehicle WHERE PlateNumber='$plateNumber'");
		
		While($row = @mysql_fetch_array($result)){
			echo "Vehicle has been added:<br /><br />";
			echo "		Vehicle ID:  ";
			echo $row['VehicleID'];
			echo "<br />";
			echo "		License Plate Number:  ";
			echo $row['PlateNumber'];
			echo "<br />";
			echo "		Make:  ";
			echo $row['Make'];
			echo "<br />";
			echo "		Model:  ";
			echo $row['Model'];
			echo "<br />";
			echo "		Class:  ";
			echo $row['Class'];
			echo "<br /> <br />";

		}	
	}

?>

</div>

<div id="footer">


By Neva Reed, Ross Levin, Tim LaCotti</div>
</div>

</body>

</html>