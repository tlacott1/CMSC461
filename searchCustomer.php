

<?php
  $rentalID = $_POST["RentalID"];

  $query = mysql_query("SELECT * FROM Policy WHERE RentalID = '$rentalID'") or die(mysql_error());
  $data = mysql_fetch_assoc($query);

?>
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td>Value1</td>
<td>Value2</td>
<td>Value3</td>
<td>Value4</td>
<td>Value5</td>
</tr>
<form name="input" action="" method="POST">

  Rental ID: <input type="text" name="RentalID"><br>

  <input type="submit" value="Submit">
</form>
