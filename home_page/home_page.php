//This code is no longer being used. It was merged with the login page for efficiency" 
<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);
echo "connected to database";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "connected to database";
    // Retrieve the user's role from the database based on their login credentials
    $Username = $_POST['Username'];
    $Password = $_POST['UserPassword'];
echo "retreived user role from database based on login credentials";
    
    // Example query to retrieve the user role based on the username and password
    $query = "SELECT Role FROM users WHERE Username = ? AND UserPassword = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $Username, $Password);
    $stmt->execute();
    $stmt->bind_result($Role);
echo "created query";
    
    // Check if the user exists and get their role
    if ($stmt->fetch()) {
        // Redirect the user based on their role
        switch ($Role) {
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
echo "went through all choices";
    // Close the database connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
