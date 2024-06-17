<?php

// Validate if the request is POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set and not empty
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['user_type'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $user_type = $_POST['user_type'];

        // Database connection details
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "jobseeker"; // Adjust to your database name

        // Create mysqli connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            echo "Error: Connection failed: " . $conn->connect_error;
        } else {
            // Prepare SQL statement to insert data
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $password, $user_type);

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "success"; // Signal success
            } else {
                echo "Error: " . $conn->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Error: All fields are required";
    }
} else {
    echo "Error: Invalid request method";
}
?>
