<?php
session_start();

$mysql_user = "rlevin2";
$mysql_password = "harryhml";
$mysql_database = "rlevin2";

mysql_connect("studentdb.gl.umbc.edu", $mysql_user, $mysql_password) or die("Can't connect to MySQL.");
mysql_select_db($mysql_database) or die("Can't connect to database.");

// Code to log the user out.
if ($_GET['page'] == "logout") {
    session_destroy();
    header('Location: index.php');
}

if ($_GET['page'] == "login") {
    $checkUser = $_POST["username"];
    $checkPass = $_POST["password"];

    // Run query.
    $query = mysql_query("SELECT Username, Password FROM user WHERE Username = '$checkUser'") or die(mysql_error());
    $data = mysql_fetch_assoc($query);

    // If the username is blank, redirect to error page.
    if (is_null($data["Username"])) {
      header('Location: index.php?err=err');
    }
    // If the password cheks out, set the username session variable and redirect.
    else if ($checkPass == $data["Password"]) {
      $_SESSION["username"] = $data["Username"];
      header('Location: index.php?page=rent');
    }
    // If any other error occurs, redirect to the error.
    else {
      header('Location: index.php?err=err');
    }
}

// If the user is not logged in, a page is accessed but is not the new user page...
else if (!isset($_SESSION["username"]) && isset($_GET['page']) && $_GET['page'] != "newUser") {
    //redirect home
    header('Location: index.php');
} else if (isset($_SESSION["username"]) && !isset($_GET['page'])) {
    // Default logged in users to the rent page.
    header('Location: index.php?page=rent');
}

// If the current page is newUser and the command is register...
if ($_GET["page"] == "newUser" && $_GET["cmd"] == "register") {
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $retype = $_POST["retypedPassword"];

  $query = mysql_query("SELECT Username FROM user WHERE Username = '$user'") or die(mysql_error());
  $data = mysql_fetch_assoc($query);

  //do not allow blank usernames or passwords
  if($user == "" || $pass == "") {
    header('Location: index.php?page=newUser&msg=userErr');
  }
  //do not allow already used usernames
  else if (!is_null($data["Username"])) {
    header('Location: index.php?page=newUser&msg=userExists');
  }
  //passwords do not match
  else if($pass != $retype) {
    header('Location: index.php?page=newUser&msg=passMismatch');
  }else {
    mysql_query("INSERT INTO user (Username, Password) VALUES ('$user', '$pass')") or die(mysql_error());
    header('Location: index.php');
  }
}

/*
if(isset($_POST["editVehicle"])) {
    header('Location: index.php?page=editVehicle');
}
if(isset($_POST["editCustomer"])) {
    header('Location: index.php?page=editCustomer');
}
if(isset($_POST["editPolicy"])) {
    header('Location: index.php?page=editPolicy');
}
*/

?>