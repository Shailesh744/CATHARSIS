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

// Get confession text from the form submission
$confessionText = $_POST['confessionText'];

// Insert confession into the database
$sql = "INSERT INTO confessions (confession_text) VALUES ('$confessionText')";
if ($conn->query($sql) === TRUE) {
    // Confession successfully submitted
    $response = ['status' => 'success', 'message' => 'Your confession has been published. Thank you!'];
} else {
    // Error in submitting confession
    $response = ['status' => 'error', 'message' => 'Error: ' . $sql . '<br>' . $conn->error];
}

// Close the database connection
$conn->close();

// Respond with the JSON-encoded response
echo json_encode($response);
?>
