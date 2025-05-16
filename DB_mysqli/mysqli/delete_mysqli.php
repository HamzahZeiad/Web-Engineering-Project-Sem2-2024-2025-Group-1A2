<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysql_connect_error());

//Select the database.
mysqli_select_db($link, "mydatabase") or die(mysqli_error($link));

//The SQL statement that deletes the record
$strSQL = "DELETE FROM people WHERE id = 2";

mysqli_query($link, $strSQL);

//Close the database connection
mysqli_close($link);
?>
