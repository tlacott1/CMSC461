<?php
  if($_GET["msg"] == "userErr") {
    print "User already exists";
  }else if($_GET["msg"] == "passMismatch") {
      print "Passwords do not match";
  }
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $retype = $_POST["retypedPassword"];
  
  $query = mysql_query("SELECT Username FROM user WHERE Username = '$user'") or die(mysql_error());
  $data = mysql_fetch_assoc($query);

  
  
  mysql_query("INSERT INTO user (Username, Password) VALUES ('$user', '$pass')") or die(mysql_error());
?>

<form method="post" action="index.php?page=newUser">
    <input type="text" name="username" placeholder="username" />
    <br />
    <input type="password" name="password" placeholder="password" />
    <br />
    <input type="password" name="retypedPassword" placeholder="retype password" />
    <br />
    <input type="submit" value="Create" />
</form>

