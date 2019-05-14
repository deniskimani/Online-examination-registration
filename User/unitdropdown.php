<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "phplearning";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM units";

// for method 1

$result2 = mysqli_query($connect, $query);


?>
