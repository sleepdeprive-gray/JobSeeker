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

// Function to fetch all users using MySQLi
function fetchAllUsers($mysqli) {
    $query = "SELECT user_id, username, email, user_type FROM Users";
    $result = $mysqli->query($query);

    // Build HTML table rows from fetched data
    $html = '';
    while ($user = $result->fetch_assoc()) {
        $html .= '<tr data-type="' . htmlspecialchars($user['user_type']) . '">';
        $html .= '<td>' . htmlspecialchars($user['user_id']) . '</td>';
        $html .= '<td>' . htmlspecialchars($user['username']) . '</td>';
        $html .= '<td>' . htmlspecialchars($user['email']) . '</td>';
        $html .= '<td id = "user-type-space" >' . htmlspecialchars($user['user_type']) . '</td>';
        $html .= '<td><input type="password" class="form-control" id="password_' . htmlspecialchars($user['user_id']) . '" placeholder="Enter new password" ></td>';
        $html .= '<td>';
        $html .= '<button type="button" class="btn btn-primary btn-sm btn-update" data-user-id="' . htmlspecialchars($user['user_id']) . '">Update</button>';
        $html .= '<button type="button" id = "delete-button" class="btn btn-danger btn-sm btn-delete" data-user-id="' . htmlspecialchars($user['user_id']) . '" data-username="' . htmlspecialchars($user['username']) . '">Delete</button>';
        $html .= '</td>';
        $html .= '</tr>';
    }

    return $html;
}

// Fetch all users
echo fetchAllUsers($mysqli);

// Close the connection
$mysqli->close();
