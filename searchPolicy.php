<?php
  $rentalID = $_POST["RentalID"];

  if(isset($_POST["submitEdit"])) {
    $query = mysql_query("UPDATE Policy SET Cost='$_POST[cost]',
      DateRent='$_POST[dateRented]', DateReturn='$_POST[dateReturn]',
      Insurance='$_POST[Insurance]' WHERE RentalID=$_POST[id]") or die(mysql_error());
    print "Database Updated Successfully";
  }else if(empty($rentalID)) {
    print "Please enter a valid Rental ID.";
  }else {

  $query = mysql_query("SELECT * FROM Policy WHERE RentalID='$rentalID'") or die(mysql_error());
  $data = mysql_fetch_assoc($query);

  if(isset($_POST["submitEdit"])) {
    print "hello";
  }
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
    echo "<form name='editThis' action='' method='POST'>";
    echo "<input type='hidden' name='id' value='$data[RentalID]'>";
    echo "Cost: ";
    echo "<input type='text' name='cost' value='$data[Cost]'><br>";
    echo "Date Rented: ";
    echo "<input type='text' name='dateRented' value='$data[DateRent]'><br>";
    echo "Date Returned: ";
    echo "<input type='text' name='dateReturn' value='$data[DateReturn]'><br>";
    echo "Insurance:";
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
