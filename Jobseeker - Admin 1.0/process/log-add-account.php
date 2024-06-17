<?php
// log-add-account.php

// Check if admin_name, action, and user parameters are set
if (isset($_POST['admin_name']) && isset($_POST['action']) && isset($_POST['user'])) {
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

    // Escape variables to prevent SQL injection
    $adminName = $conn->real_escape_string($_POST['admin_name']);
    $action = $conn->real_escape_string($_POST['action']);
    $user = $conn->real_escape_string($_POST['user']);

    // Get current timestamp
    $timestamp = date('Y-m-d H:i:s');

    // SQL query to insert history
    $sql = "INSERT INTO history (admin_name, action, user, time) 
            VALUES ('$adminName', '$action', '$user', '$timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error logging history: ' . $conn->error]);
    }

    // Close connection
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: Missing parameters']);
}
