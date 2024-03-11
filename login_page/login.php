<?php
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form
    $Username = $_POST['Username'];
    $Password = $_POST['UserPassword'];

    // Example query to retrieve the user role based on the username and password
    $query = "SELECT * FROM users WHERE Username = '$Username' AND UserPassword = '$Password'";
    $result = $conn->query($query);

    if ($result) {
        // Check if the user exists and get their role
        if ($row = $result->fetch_assoc()) {
            // Redirect the user based on their role
            switch ($row['Role']) {
                case 'ADMIN':
                    header("Location: https://usarcent.azurewebsites.net/home_page/admin_home.html");
                    exit();
                case 'ANALYST':
                    header("Location: https://usarcent.azurewebsites.net/home_page/analyst_home.html");
                    exit();
                // Add more cases for other roles if needed
                default:
                    echo "Welcome! You have a default role.";
                    break;
            }
        } else {
            // User authentication failed, handle accordingly (e.g., redirect to login page)
            echo "Authentication failed. Please check your credentials.";
        }
    } else {
        // Handle query error
        echo "Query failed: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

ob_end_flush();
?>
