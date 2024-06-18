<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobseeker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Limit the feedbacks to 5 and truncate sender_feedback to a specific length
$feedback_limit = 4;
$feedback_length = 10; // Adjust this value as needed

// SQL query to fetch the most recent 5 feedbacks with status 'received'
$sql = "SELECT feedback_id, sender_email, 
               IF(CHAR_LENGTH(sender_feedback) > $feedback_length, 
                  CONCAT(LEFT(sender_feedback, $feedback_length), '...'), 
                  sender_feedback) AS sender_feedback, 
               date_sent 
        FROM feedbacks 
        WHERE status = 'Unread'
        ORDER BY date_sent DESC 
        LIMIT $feedback_limit";

$result = $conn->query($sql);
?>