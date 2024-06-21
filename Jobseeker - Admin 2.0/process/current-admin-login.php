<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the user is logged in
    if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
        header("Location: login.php");
        exit();
    }

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

    // Get user info
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT admin_name, admin_position FROM admins WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($admin_name, $admin_position);
    $stmt->fetch();
    $stmt->close();

    $conn->close();
?>