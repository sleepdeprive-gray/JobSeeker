<?php
// log-history.php

// Check if action and user parameters are set
if (isset($_POST['action']) && isset($_POST['user'])) {
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
    $action = $conn->real_escape_string($_POST['action']);
    $user = $conn->real_escape_string($_POST['user']);
    $adminName = ""; // Replace with current admin name

    // Get current timestamp
    $timestamp = date('Y-m-d H:i:s');

    // SQL query to insert history
    $sql = "INSERT INTO history (admin_name, action, user_id, time) 
            VALUES ('$adminName', '$action', '$user', '$timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo "History logged successfully.";
    } else {
        echo "Error logging history: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Error: Missing parameters.";
}
?>