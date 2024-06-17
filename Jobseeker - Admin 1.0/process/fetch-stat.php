<?php
// fetch-data.php

// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "jobseeker"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch counts from users table
$sqlApplicants = "SELECT COUNT(*) AS applicant_count FROM users WHERE user_type = 'applicant'";
$resultApplicants = $conn->query($sqlApplicants);
$applicantCount = ($resultApplicants->num_rows > 0) ? $resultApplicants->fetch_assoc()['applicant_count'] : 0;

$sqlCompanies = "SELECT COUNT(*) AS company_count FROM users WHERE user_type = 'company'";
$resultCompanies = $conn->query($sqlCompanies);
$companyCount = ($resultCompanies->num_rows > 0) ? $resultCompanies->fetch_assoc()['company_count'] : 0;

// Fetch count from feedbacks table
$sqlFeedbacks = "SELECT COUNT(*) AS feedback_count FROM feedbacks";
$resultFeedbacks = $conn->query($sqlFeedbacks);
$feedbackCount = ($resultFeedbacks->num_rows > 0) ? $resultFeedbacks->fetch_assoc()['feedback_count'] : 0;

// Prepare response as JSON
$response = [
    'applicantCount' => $applicantCount,
    'companyCount' => $companyCount,
    'feedbackCount' => $feedbackCount,
];

echo json_encode($response);

// Close connection
$conn->close();
?>
