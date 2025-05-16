<?php
//First, connect to the MySQL server.


$link = mysqli_connect("localhost", "root", "");
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($link, "mydatabase") or die(mysqli_connect_error());

//Then, create a database named “mydatabase”.

$sql = "CREATE TABLE people (id INT AUTO_INCREMENT, FirstName VARCHAR(100), Phone INT, Address VARCHAR(100), PRIMARY KEY(id))";


if (mysqli_query($link, $sql)) {
    echo "Table created successfully\n";
} else {
    echo 'Error creating table: ' . mysqli_error($link) . "\n";
}

//And finally we close the connection to the MySQL server
mysqli_close($link);
?>
