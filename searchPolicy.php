<?php
  $rentalID = $_POST["RentalID"];
  if(empty($rentalID)) {
    print "Please enter a valid Rental ID.";
  }else {

  $query = mysql_query("SELECT * FROM Policy WHERE RentalID = '$rentalID'") or die(mysql_error());
  $data = mysql_fetch_assoc($query);


  if(empty($data) && !empty($rentalID))
  {
    print "Rental ID does not exist.";
  }else if (isset($_POST["searchPolicy"])) {
    echo "Rental ID: ";
    print($data["RentalID"]);
    echo "<br> Vehicle ID: ";
    print($data["VehicleID"]);
    echo "<br> Customer ID: ";
    print($data["CustomerID"]);
    echo "<br> Cost: ";
    print($data["Cost"]);
    echo "<br> Date Rented: ";
    print($data["DateRent"]);
    echo "<br> Date Returned: ";
    print($data["DateReturn"]);
    echo "<br> Insurance: ";
    if ($data["Insurance"] == 0) {
      print "No";
    }else {
      print "Yes";
    }
    echo "<br>";
    echo "<br>";
  }elseif (isset($_POST["editPolicy"])) {
    if (isset($_POST["submitEdit"])) {
    print "hello";
    }
    echo "<form name='input' action='' method='POST'>";
    echo "Cost: ";
    echo "<input type='text' name='cost' value='$data[Cost]'><br>";
    echo "Date Rented: ";
    echo "<input type='text' name='dateRented' value='$data[DateRent]'><br>";
    echo "Date Returned: ";
    echo "<input type='text' name='dateReturn' value='$data[DateReturn]'><br>";
    if($data["Insurance"] == 1) {
      echo "<input type='radio' name='Insurance' value=1 checked='$data[Insurance]'>Yes";
      echo "<input type='radio' name='Insurance' value=0>No<br>";
    }else {
      echo "<input type='radio' name='Insurance' value=1>Yes";
      echo "<input type='radio' name='Insurance' value=0 checked='$data[Insurance]'>No<br>";
    }
    echo "<input type='submit' name='submitEdit' value='Submit Edit'><br><br>";
    echo "</form>";
  }
}
?>

<form name="input" action="" method="POST">

  Rental ID: <input type="text" name="RentalID"><br>

  <input type="submit" name="searchPolicy" value="Search">
  <input type="submit" name="editPolicy" value="Edit">
</form>
