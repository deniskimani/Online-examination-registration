<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "phplearning";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query1 = "SELECT * FROM departments";

// for method 1

$result1 = mysqli_query($connect, $query1);


?>
