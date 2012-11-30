<?php
  $rentalID = $_POST["RentalID"];
  if(empty($rentalID)) {
    print "Please enter a valid Rental ID.";
  }else {

  $query = mysql_query("SELECT * FROM Policy WHERE RentalID = '$rentalID'") or die(mysql_error());
  $data = mysql_fetch_assoc($query);

  if(empty($data))
  {
    print "Please enter a valid Rental ID.";
  }else {
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
  }
}
?>

<form name="input" action="" method="POST">

  Rental ID: <input type="text" name="RentalID"><br>

  <input type="submit" value="Submit">
</form>
