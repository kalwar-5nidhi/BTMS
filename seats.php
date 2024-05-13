<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the bus number from the AJAX request
    $busNo = $_POST["bus_no"];

    // Prepare a SQL statement to fetch seat information for the given bus number
    $stmt = $conn->prepare("SELECT seat_number FROM seats WHERE bus_number = ?");
    $stmt->bind_param("s", $busNo);
    $stmt->execute();
    $result = $stmt->get_result();

    // Prepare an array to store booked seats
    $bookedSeats = [];

    // Fetch the results and store booked seat numbers in the array
    while ($row = $result->fetch_assoc()) {
        $bookedSeats[] = $row["seat_number"];
    }

    // Send the JSON response with booked seat numbers
    header('Content-Type: application/json');
    echo json_encode(["bookedSeats" => $bookedSeats]);

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Invalid request method"]);
}
?>
