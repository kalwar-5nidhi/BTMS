<?php
include 'database.php'; // Include the file with database connection code

if (isset($_POST['done'])) {
    // Assign values from form to variables
    $terminal_name = $_POST['terminal_name'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $status = $_POST['status'];
    $date_updated = $_POST['date_updated'];

    // Sanitize user inputs to prevent SQL injection
    $terminal_name = mysqli_real_escape_string($con, $terminal_name);
    $city = mysqli_real_escape_string($con, $city);
    $state = mysqli_real_escape_string($con, $state);
    $status = mysqli_real_escape_string($con, $status);
    $date_updated = mysqli_real_escape_string($con, $date_updated);

  

    $q = "UPDATE routes SET `terminal_name` = '$terminal_name', `city` = '$city', 
    `state` = '$state', `status` = '$status', `date_updated` = '$date_updated'";

    // Execute the query
    $query = mysqli_query($con, $q);

    if ($query) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Operation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-lg-6 m-auto">
    <form method="post">
        <br><br>
        <div class="card">
            <div class="card-header bg-dark">
                <h1 class="text-white text-center">Update Operation</h1>
            </div><br>
            <label>terminal_name:</label>
            <input type="text" name="terminal_name" class="form-control"><br>
            <label>city:</label>
            <input type="text" name="city" class="form-control"><br>
            <label>state:</label>
            <input type="text" name="state" class="form-control"><br>
            <label>status:</label>
            <input type="text" name="status" class="form-control"><br>
            <label>date_updated:</label>
            <input type="text" name="date_updated" class="form-control"><br>
            <button class="btn btn-success" type="submit" name="done">Submit</button><br>
        </div>
    </form>
</div>
</body>
</html>
