<?php
// Connection details
$servername = "localhost";
$username = "user";
$password = "pass";
$database = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve vehicle locations from the database
$sql = "SELECT vehicle_name, latitude, longitude, timestamp FROM vehicle_locations";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch associative array
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    // Output data as JSON
    header('Content-Type: application/json');
    echo json_encode($rows);
} else {
    // No results found
    echo "No data found";
}

// Close connection
$conn->close();
?>