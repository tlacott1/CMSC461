<?php
  $page = $_GET['page'];
  switch($page) {
    case "add":
      require "add.php";
      break;
    case "delete":
      require "Delete.php";
      break;
    case "edit":
      require "Edit.php";
      break;
    case "rent":
      require "Rent.php";
      break;
    case "return":
      require "Return.php";
      break;
    case "search":
      require "Search.php";
      break;
    default:
      require "login.php";
      break;
  }
?>