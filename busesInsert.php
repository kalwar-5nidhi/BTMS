<?php
include 'database.php'; // Include the file with database connection code

if(isset($_POST['done'])){
    // Assign values from form to variables
    $bus_name = $_POST['bus_name'];
    $bus_number = $_POST['bus_number'];
    $capacity = $_POST['capacity'];
    $From = $_POST['From'];
    $To = $_POST['To'];
    $status = $_POST['status'];
    $date_updated= $_POST['date_updated'];

    // Construct the SQL query with backticks for the 'To' column and 'status' column
    $q = "INSERT INTO `buses`(`bus_name`, `bus_number`, `capacity`, `From`, `To`, `status`, `date_updated`) 
          VALUES ('$bus_name', '$bus_number', '$capacity', '$From', '$To', '$status', '$date_updated')";

    // Execute the query
    $query = mysqli_query($con, $q);

    if ($query) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Insert Operation </h1>
 </div><br>

 <label> Bus Name: </label>
 <input type="text" name="bus_name" class="form-control"> <br>

 <label> Bus Number: </label>
 <input type="text" name="bus_number" class="form-control"> <br>

 <label> Capacity: </label>
 <input type="text" name="capacity" class="form-control"> <br>

 <label> From: </label>
 <input type="text" name="From" class="form-control"> <br>

 <label> To: </label>
 <input type="text" name="To" class="form-control"> <br>

 <label> status: </label>
 <input type="text" name="status" class="form-control"> <br>

 <label> date_updated: </label>
 <input type="text" name="date_updated" class="form-control"> <br> <!-- Fixed the missing double quote here -->

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
