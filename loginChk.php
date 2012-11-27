<?php

$checkUser = $_POST["username"];
$checkPass = $_POST["password"];
$mysql_user = "rlevin2";
$mysql_password = "harryhml";
$mysql_database = "rlevin2";

mysql_connect("studentdb.gl.umbc.edu", $mysql_user, $mysql_password) or die("Can't connect to MySQL.");
mysql_select_db($mysql_database) or die("Can't connect to database.");
$result = mysql_query("SELECT Password FROM user WHERE Username = '$checkUser'") or die(mysql_error());
$data = mysql_fetch_assoc($result);


if ($data["Password"] == $checkPass) {
  print "<b>Great Success</b>";
} else {
  print "ail";
}

?>