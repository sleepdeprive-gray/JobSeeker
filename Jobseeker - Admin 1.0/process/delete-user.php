<?php

$host = 'localhost'; // Your database host
$db = 'jobseeker';   // Your database name
$user = 'root';      // Your database username
$pass = '';          // Your database password

// Create connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if user_id is provided via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Prepare and execute SQL query to delete user
    $query = "DELETE FROM Users WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            echo "User deleted successfully";
        } else {
            echo "User with ID $user_id not found";
        }
    } else {
        echo "Error deleting user: " . $mysqli->error;
        // Handle the error appropriately, log it, etc.
    }

    $stmt->close(); // Close the statement
}

// Close the connection
$mysqli->close();
?>