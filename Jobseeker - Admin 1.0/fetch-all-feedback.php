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

// Pagination settings
$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch feedbacks with pagination
$feedbacksQuery = "SELECT feedback_id, sender_email, sender_feedback, status, date_sent FROM feedbacks ORDER BY date_sent DESC LIMIT $limit OFFSET $offset";
$feedbacksResult = $conn->query($feedbacksQuery);

if (!$feedbacksResult) {
    die("Error executing query: " . $conn->error);
}

// Fetch total number of feedbacks
$totalFeedbacksQuery = "SELECT COUNT(*) AS total FROM feedbacks";
$totalFeedbacksResult = $conn->query($totalFeedbacksQuery);
$totalFeedbacks = $totalFeedbacksResult->fetch_assoc()['total'];
$limit = 8; // Assuming a limit of 10 feedbacks per page
$totalPages = ceil($totalFeedbacks / $limit);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_page = max(1, $current_page - 1);
$end_page = min($totalPages, $current_page + 1);

// Adjust the start and end page to always show 3 pages
if ($current_page == 1) {
    $start_page = 1;
    $end_page = min(3, $totalPages);
} elseif ($current_page == $totalPages) {
    $start_page = max(1, $totalPages - 2);
    $end_page = $totalPages;
} else {
    $start_page = $current_page - 1;
    $end_page = $current_page + 1;
}

