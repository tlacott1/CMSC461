<?php
  if ($_GET["err"] == "err") {
    print "There is a problem with the Username/Password.";
  }
?>

<form method="post" action="index.php?page=login">
    <input type="text" name="username" placeholder="username" />
    <br />
    <input type="password" name="password" placeholder="password" />
    <br />
    <input type="submit" value="Login" />
</form>

<a href="index.php?page=newUser">Create New User</a>
