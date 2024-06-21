<?php
// logout.php

session_start();

// Log the logout action
if (isset($_SESSION['adminName'])) {
    $adminName = $_SESSION['adminName'];
    $action = 'Logged Out';
    $user = $adminName; // Assuming the user logging out is the admin themselves

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
    $action = $conn->real_escape_string($action);
    $user = $conn->real_escape_string($user);

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
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>