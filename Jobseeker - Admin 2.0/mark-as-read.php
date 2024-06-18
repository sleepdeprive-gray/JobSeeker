<?php
// Check if mark_read_email parameter is set
if (isset($_POST['mark_read_email'])) {
    $email = $_POST['mark_read_email'];

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

    // Escape email to prevent SQL injection
    $email = $conn->real_escape_string($email);

    // SQL query to update feedback status to 'Read'
    $sql = "UPDATE feedbacks SET status = 'Read' WHERE sender_email = '$email'";

    // Debugging: Log SQL query
    error_log("SQL Query: " . $sql);

    if ($conn->query($sql) === TRUE) {
        // Update successful
        echo "Feedback marked as read successfully.";
    } else {
        // Update failed
        echo "Error updating record: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // Handle case where mark_read_email parameter is not set
    echo "Error: mark_read_email parameter is not set.";
}
?>
