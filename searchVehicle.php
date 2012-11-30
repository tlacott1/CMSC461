<?php
  $vehicleID = $_POST["VehicleID"];
  $plateNum = $_POST["plateNum"];
  $queryString = "SELECT * FROM Vehicle WHERE ";


  if(!empty($vehicleID)) {
    $queryString.="VehicleID = '$vehicleID'";
  }
  if(!empty($vehicleID) && !empty($plateNum))
  {
    $queryString.=" and ";
  }
  if(!empty($plateNum))
  {
    $queryString.="PlateNumber = '$plateNum'";
  }
  if(empty($vehicleID) && empty($plateNum)) {
    print "Enter one or more things to search for.";
  }else{
  $query = mysql_query($queryString) or die(mysql_error());

  //first column
  echo "<div class='cell'>";
  echo "<b>VehicleID</b>" ;
  echo "</div>";

  //second column
  echo "<div class='cell'>";
  echo "<b>Plate</b>" ;
  echo "</div>";

  //third column
  echo "<div class='cell'>";
  echo "<b>Make</b>" ;
  echo "</div>";

  //fourth column
  echo "<div class='cell'>";
  echo "<b>Model</b>" ;
  echo "</div>";

  //fifth column
  echo "<div class='cell'>";
  echo "<b>Class</b>" ;
  echo "</div>";

  //new row
  echo "<br/>";

  while($data = mysql_fetch_assoc($query)) {
    //first column
    echo "<div class='cell'>";
    echo $data['VehicleID'] ;
    echo "</div>";

    //second column
    echo "<div class='cell'>";
    echo $data['PlateNumber'];
    echo "</div>";

    //third column
    echo "<div class='cell'>";
    echo $data['Make'];
    echo "</div>";

    //fourth column
    echo "<div class='cell'>";
    echo $data['Model'];
    echo "</div>";

    //fifth column
    echo "<div class='cell'>";
    echo $data['Class'];
    echo "</div>";

    //new row
    echo "<br/>";
  }


}


?>

<form name="input" action="" method="POST">

  Vehicle ID: <input type="text" name="VehicleID"><br>
  Plate Number: <input type="text" name="plateNum"><br>

  <input type="submit" value="Submit">
</form>
