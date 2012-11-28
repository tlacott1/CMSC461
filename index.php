<?php
  require "headers.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Vehicle Rental Management System</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="container">

    <div id="header">
    <h1><b>Vehicle Rental Management System</b></h1>
    </div>
    
    <?php
    if(isset($_SESSION['username'])) {
      echo "<div id=\"menu\" >";
      require "links.php";
      echo "</div>";
    }
    ?>
    
    <div id="content" align="center">
      <?php
        require "content.php";
      ?>
    </div>

    <div id="footer">
    By Neva Reed, Ross Levin, Tim LaCotti
    </div>
</div>
</body>
</html>