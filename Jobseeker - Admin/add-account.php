<?php

// Assuming this PHP script connects to your MySQL database
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "jobseeker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to log history
function logHistory($admin_name, $action, $user) {
    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server name
    $username = "root"; // MySQL username
    $password = ""; // MySQL password
    $dbname = "jobseeker"; // Database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare data for insertion
    $admin_name = $conn->real_escape_string($admin_name);
    $action = $conn->real_escape_string($action);
    $user = $conn->real_escape_string($user);

    // Get current timestamp
    $time = date('Y-m-d H:i:s');

    // Insert into history table
    $sql = "INSERT INTO history (admin_name, action, user, time) 
            VALUES ('$admin_name', '$action', '$user', '$time')";

    if ($conn->query($sql) === TRUE) {
        // Log successfully inserted
        // You may optionally return a success message or handle further actions
    } else {
        // Log insertion failed
        // Handle error
        error_log("Error inserting history record: " . $conn->error);
    }

    // Close connection
    $conn->close();
}


// Retrieve POST data (sanitize inputs if necessary)
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']); // Remember to hash this password securely
$user_type = $conn->real_escape_string($_POST['user_type']);

// Example of hashing password (use appropriate hashing method)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into `users` table with hashed password
$sql = "INSERT INTO users (username, email, password, user_type) VALUES ('$username', '$email', '$hashed_password', '$user_type')";
if ($conn->query($sql) === TRUE) {
    // Return success response
    echo json_encode(['success' => true]);
} else {
    // Return error response
    echo json_encode(['error' => 'Error inserting user: ' . $conn->error]);
}

$conn->close();
?>