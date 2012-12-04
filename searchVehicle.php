<?php

  $vehicleID = $_POST["VehicleID"];
  $plateNum = $_POST["plateNum"];
  $queryString = "SELECT * FROM Vehicle WHERE ";

  if(isset($_POST["submitEdit"])) {
    $query = mysql_query("UPDATE Vehicle SET PlateNumber='$_POST[plate]',
      Make='$_POST[make]',Model='$_POST[model]', Class='$_POST[class]',
      Price='$_POST[price]'") or die(mysql_error());
    print "Database Updated Successfully";
  }else {
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

    if(isset($_POST["searchVehicle"])) {
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

      //sixth column
      echo "<div class='cell'>";
      echo "<b>Price</b>" ;
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

        //sixth column
        echo "<div class='cell'>";
        echo $data['Price'];
        echo "</div>";

        //new row
        echo "<br/>";
      }
  }else if(isset($_POST["editVehicle"])) {
      $data = mysql_fetch_assoc($query);
      if(empty($data)) {
        print "Does not exist.";
      }else if(mysql_num_rows($query) > 1) {
          print "Entry returned more that one result. Please enter more than one field";
      }else {
        echo "<form name='editThis' action='' method='POST'>";
        echo "Plate: ";
        echo "<input type='text' name='plate' value='$data[PlateNumber]'><br>";
        echo "Make: ";
        echo "<input type='text' name='make' value='$data[Make]'><br>";
        echo "Model: ";
        echo "<input type='text' name='model' value='$data[Model]'><br>";
        echo "Class: ";
        echo "<input type='text' name='class' value='$data[Class]'><br>";
        echo "Price: ";
        echo "<input type='text' name='price' value='$data[Price]'><br>";
        echo "<input type='submit' name='submitEdit' value='Submit Edit'><br><br>";
        echo "</form>";
      }
    }
  }
}
?>

<form name="input" action="" method="POST">

  Vehicle ID: <input type="text" name="VehicleID"><br>
  Plate Number: <input type="text" name="plateNum"><br>

  <input type="submit" name="searchVehicle" value="Search">
  <input type="submit" name="editVehicle" value="Edit">
</form>
