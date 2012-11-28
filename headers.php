<?php
session_start();

$mysql_user = "rlevin2";
$mysql_password = "harryhml";
$mysql_database = "rlevin2";

mysql_connect("studentdb.gl.umbc.edu", $mysql_user, $mysql_password) or die("Can't connect to MySQL.");
mysql_select_db($mysql_database) or die("Can't connect to database.");


if ($_GET['page'] == "login") {
    $checkUser = $_POST["username"];
    $checkPass = $_POST["password"];
    $query = mysql_query("SELECT Username, Password FROM user WHERE Username = '$checkUser'") or die(mysql_error());
    $data = mysql_fetch_assoc($query);
    
    if (is_null($data["Username"])) {
      print "Not a valid username";
    }else if ($checkPass == $data["Password"]) {
      $_SESSION["username"] = $data["Username"];
      header('Location: https://userpages.umbc.edu/~tlacott1/index.php?page=add');
    } else {
      print "Password is invalid";
    }
}
?>