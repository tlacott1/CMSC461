<?php
  if($_GET["msg"] == "userErr") {
    print "Username/Password can't be blank.";
  }else if($_GET["msg"] == "passMismatch") {
      print "Passwords do not match.";
  }else if ($_GET["msg"] == "userExists") {
    print "Username already exists.";
  }
?>

<form method="post" action="index.php?page=newUser&cmd=register">
    <input type="text" name="username" placeholder="username" />
    <br />
    <input type="password" name="password" placeholder="password" />
    <br />
    <input type="password" name="retypedPassword" placeholder="retype password" />
    <br />
    <input type="submit" value="Create" />
</form>

