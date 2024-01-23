<?php
header('Content-Type: application/json');

// Replace these values with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'catharsis';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch confessions from the database
$sql = "SELECT * FROM confessions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch and store confessions in an array
    $confessions = [];
    while ($row = $result->fetch_assoc()) {
        $confessions[] = $row;
    }

    // Respond with the JSON-encoded array of confessions
    echo json_encode($confessions);
} else {
    // Respond with an empty array if no confessions are found
    echo json_encode([]);
}

// Close the database connection
$conn->close();
?>
