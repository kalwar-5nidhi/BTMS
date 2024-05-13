<?php
// Establish a connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$database = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the buses table
$sql = "SELECT * FROM buses";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='image-container'>";
        echo "<img src='" . $row['image_url'] . "' alt='" . $row['bus_name'] . "'>";
        echo "<h2>" . $row['bus_name'] . "</h2>";
        echo "<h4>Bus No." . $row['bus_number'] . "</h4>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
