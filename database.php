<?php
$hostname = 'localhost'; // or your database host name
$username = 'root';      // your database username
$password = '';          // your database password
$database = 'data';      // your database name

// Create connection
$con = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
