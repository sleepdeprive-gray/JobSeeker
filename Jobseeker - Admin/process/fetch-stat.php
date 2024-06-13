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

// Fetch data for applicants, companies, and feedbacks
$applicantsQuery = "SELECT COUNT(*) AS total FROM users WHERE user_type = 'applicant'";
$companiesQuery = "SELECT COUNT(*) AS total FROM users WHERE user_type = 'company'";
$feedbacksQuery = "SELECT COUNT(feedback_id) AS total FROM feedbacks";

// Execute queries
$applicantsResult = $conn->query($applicantsQuery);
$companiesResult = $conn->query($companiesQuery);
$feedbacksResult = $conn->query($feedbacksQuery);

// Process results
$applicantsCount = $applicantsResult->fetch_assoc()['total'];
$companiesCount = $companiesResult->fetch_assoc()['total'];
$feedbacksCount = $feedbacksResult->fetch_assoc()['total'];

// Close connection
$conn->close();

// Prepare data as an associative array
$data = [
    'applicants' => $applicantsCount,
    'companies' => $companiesCount,
    'feedbacks' => $feedbacksCount
];

// Output data as JSON
header('Content-Type: application/json');