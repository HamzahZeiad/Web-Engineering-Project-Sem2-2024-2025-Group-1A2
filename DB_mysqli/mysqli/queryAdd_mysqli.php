<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "mydatabase") or die(mysqli_error());

//SQL query
$strSQL = "SELECT * FROM people where Address like '%Kuantan%'";

//Execute the query (the recordset $rs contains the result)
$rs = mysqli_query($link, $strSQL);

//Loop the recordset $rs 

while ($row=mysqli_fetch_array($rs)){
//Write the value of the column FirstName and Address
echo $row['FirstName']. "  ". $row['Address']. "<br/>";
}
//Close the database connection
mysqli_close($link);
?>
