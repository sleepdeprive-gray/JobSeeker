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

$query = "SELECT user_id, username, email, user_type FROM users";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Determine the user type and assign appropriate data-type attribute
        switch ($row['user_type']) {
            case 'applicant':
                $userType = 'applicant';
                break;
            case 'company':
                $userType = 'company';
                break;
            case 'admin':
                $userType = 'admin';
                break;
            default:
                $userType = 'unknown';
        }

        // Output each user data row with buttons
        echo "<tr data-type='{$userType}'>";
        echo "<td>{$row['user_id']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['user_type']}</td>";
        echo "<td>
                <button id = 'update-button' class='btn btn-primary btn-update' 
                        data-user-id='{$row['user_id']}' 
                        data-username='{$row['username']}' 
                        data-bs-toggle='modal' 
                        data-bs-target='#updatePasswordModal'>
                    Update Password
                </button>
                <button id = 'delete-button' class='btn btn-danger btn-delete' 
                        data-user-id='{$row['user_id']}'>
                    Delete
                </button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No users found</td></tr>";
}

// Close the connection
$mysqli->close();

?>
