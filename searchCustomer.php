<?php
  $customerID = $_POST["CustomerID"];
  $name = $_POST["Name"];
  $licenseNum = $_POST["LicenseNum"];
  $queryString = "SELECT * FROM Customer WHERE ";


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
}

?>

<form name="input" action="" method="POST">
  <br>
  Customer ID: <input type="text" name="CustomerID"><br>
  Name: <input type="text" name="Name"><br>
  License #: <input type="text" name="LicenseNum"><br>

  <input type="submit" value="Submit">
</form>
