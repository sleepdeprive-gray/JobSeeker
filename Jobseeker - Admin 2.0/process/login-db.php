<?php
// Start session
session_start();

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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = $_POST['username_email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT user_id, user_type, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_email, $username_email);
    $stmt->execute();
    $stmt->bind_result($user_id, $user_type, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if ($user_type && password_verify($password, $hashed_password)) {
        // Store user info in session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_type'] = $user_type;

        // Redirect based on user type
        if ($user_type == 'applicant') {
            header("Location: applicant-dashboard.php");
        } elseif ($user_type == 'company') {
            header("Location: company-dashboard.php");
        } elseif ($user_type == 'admin') {
            header("Location: admin-dashboard.php");
        } else {
            echo "Invalid user type.";
        }
    } else {
        echo "Invalid username/email or password.";
    }
}

$conn->close();
?>