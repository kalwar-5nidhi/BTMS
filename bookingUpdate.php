<?php
include 'database.php'; // Include the file with database connection code

if (isset($_POST['done'])) {
    // Assign values from form to variables
    $booking_id = $_POST['booking_id'];
    $bus_id = $_POST['bus_id'];
    $seat_id = $_POST['seat_id'];
    $passenger_name = $_POST['passenger_name'];
    $booking_date = $_POST['booking_date'];

    // Sanitize user inputs to prevent SQL injection
    $booking_id = mysqli_real_escape_string($con, $booking_id);
    $bus_id = mysqli_real_escape_string($con, $bus_id);
    $seat_id = mysqli_real_escape_string($con, $seat_id);
    $passenger_name = mysqli_real_escape_string($con, $passenger_name);
    $booking_date = mysqli_real_escape_string($con, $booking_date);

    // Construct the UPDATE query
    $q = "UPDATE booking SET 
            `bus_id` = '$bus_id', 
            `seat_id` = '$seat_id', 
            `passenger_name` = '$passenger_name', 
            `booking_date` = '$booking_date' 
          WHERE `booking_id` = '$booking_id'";

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
    <title>Update Booking</title>
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
                <h1 class="text-white text-center">Update Booking</h1>
            </div><br>
            <label>Booking ID:</label>
            <input type="text" name="booking_id" class="form-control"><br>
            <label>Bus ID:</label>
            <input type="text" name="bus_id" class="form-control"><br>
            <label>Seat ID:</label>
            <input type="text" name="seat_id" class="form-control"><br>
            <label>Passenger Name:</label>
            <input type="text" name="passenger_name" class="form-control"><br>
            <label>Booking Date:</label>
            <input type="text" name="booking_date" class="form-control"><br>
            <button class="btn btn-success" type="submit" name="done">Submit</button><br>
        </div>
    </form>
</div>
</body>
</html>

