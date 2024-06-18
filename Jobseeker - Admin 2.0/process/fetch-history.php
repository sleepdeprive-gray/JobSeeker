<?php

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

// Fetch history data from history table
$sql = "SELECT admin_name, action, user_id, time
        FROM history
        ORDER BY time DESC
        LIMIT 4";

$result = $conn->query($sql);
?>