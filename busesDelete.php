<?php
include 'database.php';

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($con, $id);

    $q = "DELETE FROM `buses` WHERE bus_id = $id";

    if (mysqli_query($con, $q)) {
        header('location: busesDisplay.php');
        exit; // Stop further execution
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No ID specified for deletion.";
}
?>
