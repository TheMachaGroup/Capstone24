<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

// Retrieve the user's role from the database based on their login credentials
$Username = $_POST['Username'];
$Password = $_POST['UserPassword'];

// Example query to retrieve the user role based on the username and password
$query = "SELECT Role FROM users WHERE Username = ? AND UserPassword = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $Username, $Password);
$stmt->execute();
$stmt->bind_result($userRole);

// Check if the user exists and get their role
if ($stmt->fetch()) {
    // Start output buffering to capture HTML content
    ob_start();
  
    // Use a switch statement or if conditions to generate content based on the user role
    switch ($Role) {
        case 'ADMIN':
            echo '<p>Welcome, Admin! You have access to all features.</p>';
            echo '<button type="button">Create Report</button>';
            break;
        case 'ANALYST':
            echo '<p>Welcome, Analyst! You have limited access.</p>';
            break;
    }

// Close the database connection
$stmt->close();
$conn->close();
?>
