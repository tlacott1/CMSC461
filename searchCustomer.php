<?php
  $customerID = $_POST["CustomerID"];
  $name = $_POST["Name"];
  $licenseNum = $_POST["LicenseNum"];
  $queryString = "SELECT * FROM Customer WHERE ";


  if(isset($_POST["submitEdit"])) {
    $query = mysql_query("UPDATE Customer SET Name='$_POST[name]', DOB='$_POST[dob]',
      LicenseNum='$_POST[licenseNum]', PhoneNum='$_POST[phoneNum]', Address='$_POST[address]',
      CreditCardNum='$_POST[credit]' WHERE CustomerID=$_POST[id]") or die(mysql_error());
    print "Database Updated Successfully";
  }else {
    if(!empty($customerID)) {
      $queryString.="CustomerID = '$customerID'";
    }
    if(!empty($customerID) && !empty($name))
    {
      $queryString.=" and ";
    }
    if(!empty($customerID) && !empty($licenseNum))
    {
      $queryString.=" and ";
    }
    if(!empty($name)) {
      $queryString.="Name = '$name'";
    }
    if(!empty($name) && !empty($licenseNum)) {
      $queryString.=" and ";
    }
    if(!empty($licenseNum)) {
      $queryString.="LicenseNum = '$licenseNum'";
    }
    if(empty($customerID) && empty($name) && empty($licenseNum)) {
      print "Enter one or more things to search for.";
    }else{
    $query = mysql_query($queryString) or die(mysql_error());

    if(isset($_POST["searchCustomer"])) {
    //seventh column
      echo "<div class='cell'>";
      echo "<b>CustomerID</b>" ;
      echo "</div>";

      //first column
      echo "<div class='cell'>";
      echo "<b>Name</b>" ;
      echo "</div>";

      //second column
      echo "<div class='cell'>";
      echo "<b>DOB</b>" ;
      echo "</div>";

      //third column
      echo "<div class='cell'>";
      echo "<b>License</b>" ;
      echo "</div>";

      //fourth column
      echo "<div class='cell'>";
      echo "<b>Phone</b>" ;
      echo "</div>";

      //fifth column
      echo "<div class='cell'>";
      echo "<b>Address</b>" ;
      echo "</div>";

      //sixth column
      echo "<div class='cell'>";
      echo "<b>Credit Card</b>" ;
      echo "</div>";

      //new row
      echo "<br/>";

    while($data = mysql_fetch_assoc($query)) {
      //first column
      echo "<div class='cell'>";
      echo $data['CustomerID'] ;
      echo "</div>";

      //second column
      echo "<div class='cell'>";
      echo $data['Name'];
      echo "</div>";

      //third column
      echo "<div class='cell'>";
      echo $data['DOB'];
      echo "</div>";

      //fourth column
      echo "<div class='cell'>";
      echo $data['LicenseNum'];
      echo "</div>";

      //fifth column
      echo "<div class='cell'>";
      echo $data['PhoneNum'];
      echo "</div>";

      //sixth column
      echo "<div class='cell'>";
      echo $data['Address'];
      echo "</div>";

      //seventh column
      echo "<div class='cell'>";
      echo $data['CreditCardNum'];
      echo "</div>";

      //new row
      echo "<br/>";
      }
    }else if(isset($_POST["editCustomer"])) {
      $data = mysql_fetch_assoc($query);
      if(empty($data)) {
        print "Does not exist.";
      }else if(mysql_num_rows($query) > 1){
        print "Entry returned more that one result. Please enter more than one field";
      }else{
        echo "<form name='editThis' action='' method='POST'>";
        echo "<input type='hidden' name='id' value='$data[CustomerID]'>";
        echo "Name: ";
        echo "<input type='text' name='name' value='$data[Name]'><br>";
        echo "DOB: ";
        echo "<input type='text' name='dob' value='$data[DOB]'><br>";
        echo "License Number: ";
        echo "<input type='text' name='licenseNum' value='$data[LicenseNum]'><br>";
        echo "Phone Number: ";
        echo "<input type='text' name='phoneNum' value='$data[PhoneNum]'><br>";
        echo "Address: ";
        echo "<input type='text' name='address' value='$data[Address]'><br>";
        echo "Credit Card: ";
        echo "<input type='text' name='credit' value='$data[CreditCardNum]'><br>";

        echo "<input type='submit' name='submitEdit' value='Submit Edit'><br><br>";
        echo "</form>";
      }
    }
  }
}

?>

<form name="input" action="" method="POST">
  <br>
  Customer ID: <input type="text" name="CustomerID"><br>
  Name: <input type="text" name="Name"><br>
  License #: <input type="text" name="LicenseNum"><br>

  <input type="submit" name="searchCustomer" value="Search">
  <input type="submit" name="editCustomer" value="Edit">
</form>
