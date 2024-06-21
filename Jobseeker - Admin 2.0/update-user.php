<?php
$host = 'localhost'; // Your database host
$db = 'jobseeker';   // Your database name
$user = 'root';      // Your database username
$pass = '';          // Your database password

// Create connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if user_id and password are provided via POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_POST['password'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    // Hash the password (adjust hashing method as per your system)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL query to update user password
    $query = "UPDATE users SET password = ? WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("si", $password_hash, $user_id);

    if ($stmt->execute()) {
        // Password updated successfully
        echo "Password updated successfully";
    } else {
        // Error updating password
        echo "Error updating password: " . $mysqli->error;
        // Handle the error appropriately, log it, etc.
    }

    $stmt->close(); // Close the statement
}

// Close the connection
$mysqli->close();
?>
