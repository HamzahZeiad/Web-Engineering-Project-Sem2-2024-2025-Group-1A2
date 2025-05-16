<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "mydatabase") or die(mysqli_error($link));

//SQL query
$strSQL = "SELECT * FROM people";

//Execute the query (the recordset $rs contains the result)
$rs = mysqli_query($link, $strSQL);

//Loop the recordset $rs 
//Each row will be made into an array ($row) using mysql_fetch_array 

while ($row=mysqli_fetch_array($rs)){

//Write the value of the column FirstName (which is now in the array ($row)
echo $row['FirstName']. "<br/>";
}
//Close the database connection
mysqli_close($link);
?>
