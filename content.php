<?php
  $page = $_GET['page'];
  switch($page) {
    case "add":
      require "add.php";
      break;
    case "delete":
      require "delete.php";
      break;
    case "edit":
      require "edit.php";
      break;
    case "rent":
      require "rent.php";
      break;
    case "return":
      require "return.php";
      break;
    case "search":
      require "search.php";
      break;
    case "newUser":
      require "newUser.php";
      break;
    case "getInfo":
      require "getInfo.php";
      break;
    default:
      require "login.php";
      break;
  }
?>