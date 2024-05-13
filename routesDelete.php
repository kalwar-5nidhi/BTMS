<?php

include 'database.php';

$id = $_GET['id'];

$q = " DELETE FROM `routes` WHERE id = $id ";

mysqli_query($con, $q);

header('location:routesDisplay.php');

?>