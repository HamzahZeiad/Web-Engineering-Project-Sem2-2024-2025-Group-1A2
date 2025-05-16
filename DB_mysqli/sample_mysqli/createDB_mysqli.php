<?php
// config_all.php
// creation of database,table and insert of sample records.

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
if (mysqli_query($con,"CREATE DATABASE user"))
  {
 echo "<br><br>"; 
 echo "<h3>Your database has been created !!! <h3>";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
 
mysqli_select_db($con,"user") or die(mysqli_error($con));

$query1 ='CREATE TABLE members( '.
         'member_id INT(11) NOT NULL AUTO_INCREMENT, '.
         'username VARCHAR(100) NOT NULL, '.
         'password VARCHAR(100) NOT NULL, '.
         'PRIMARY KEY(member_id))';

if (mysqli_query($con, $query1))
{
echo "<h3> Your table has also created !!! </h3>";
 } 
else
  {
  echo "<br>";
  echo "Error creating table: " . mysqli_error($con);
  }


mysqli_close($con);
?>


