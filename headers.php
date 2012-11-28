<?php
session_start();

$mysql_user = "rlevin2";
$mysql_password = "harryhml";
$mysql_database = "rlevin2";

mysql_connect("studentdb.gl.umbc.edu", $mysql_user, $mysql_password) or die("Can't connect to MySQL.");
mysql_select_db($mysql_database) or die("Can't connect to database.");

if ($_GET['page'] == "logout") {
    session_destroy();
    header('Location: index.php');
}

if ($_GET['page'] == "login") {
    $checkUser = $_POST["username"];
    $checkPass = $_POST["password"];
    $query = mysql_query("SELECT Username, Password FROM user WHERE Username = '$checkUser'") or die(mysql_error());
    $data = mysql_fetch_assoc($query);

    if (is_null($data["Username"])) {
      header('Location: index.php?page=rent&err=err');
    } else if ($checkPass == $data["Password"]) {
      $_SESSION["username"] = $data["Username"];
      header('Location: index.php?page=rent');
    } else {
      header('Location: index.php?page=rent&err=err');
    }
}

if (!isset($_SESSION["username"]) && isset($_GET['page']) && $_GET['page'] != "newUser") {
    header('Location: index.php');
} else if (isset($_SESSION["username"]) && !isset($_GET['page'])) {
    header('Location: index.php?page=rent');
}

if ($_GET["page"] == "newUser" && $_GET["cmd"] == "register") {
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $retype = $_POST["retypedPassword"];

  $query = mysql_query("SELECT Username FROM user WHERE Username = '$user'") or die(mysql_error());
  $data = mysql_fetch_assoc($query);

  if(is_null($user)) {
    header('Location: index.php?page=newUser&msg=userErr');
  }else if (!is_null($data["Username"])) {
    header('Location: index.php?page=newUser&msg=userExists');
  }else if($pass != $retype) {
    header('Location: index.php?page=newUser&msg=passMismatch');
  }else {
    mysql_query("INSERT INTO user (Username, Password) VALUES ('$user', '$pass')") or die(mysql_error());
  }
}
?>