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
<h1><b>Welcome!</b></h1>
</div>

<div id="content" align="center">

  <form method="post" action="loginChk.php">
    <input type="text" name="username" placeholder="username" />
    <br />
    <input type="password" name="password" placeholder="password" />
    <br />
    <input type="submit" value="login" />
  </form>

</div>

<div id="footer">
By Neva Reed, Ross Levin, Tim LaCotti</div>
</div>

<?php

$checkUser = $_POST["username"];
$checkPass = $_POST["password"];
$mysql_user = "rlevin2";
$mysql_password = "harryhml";
$mysql_database = "rlevin2";

mysql_connect("studentdb.gl.umbc.edu", $mysql_user, $mysql_password) or die("Can't connect to MySQL.");
mysql_select_db($mysql_database) or die("Can't connect to database.");

$username_query = mysql_query("SELECT Username FROM user WHERE Username = '$checkUser'") or die(mysql_error());

$password_query = mysql_query("SELECT Username, Password FROM user WHERE Username = '$checkUser'") or die(mysql_error());
$password_data = mysql_fetch_assoc($password_query);

if (is_null($password_data["Username"])) {
  print "Not a valid username";
}else if ($password_data["Password"] == $checkPass) {
  header('Location: https://userpages.umbc.edu/~nreed2/461/Web Page.php');
} else {
  print "Password is invalid";
}

?>