<?php

include 'database.php';

$id = $_GET['id'];

$q = " DELETE FROM `booking` WHERE id = $id ";

mysqli_query($con, $q);

header('location:bookingDisplay.php');

?>