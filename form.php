//This page is currently not working as of 3/8
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to the database<br>";

    // Retrieve the user's role from the database based on their login credential
    $Username = $_POST['Username'];
    $Password = $_POST['UserPassword'];

    // Example query to retrieve the user role based on the username and password
    $query = "SELECT Role FROM users WHERE Username = ? AND UserPassword = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $Username, $Password);
    $stmt->execute();
    $stmt->bind_result($Role);

    // Check if the user exists and get their role
    if ($stmt->fetch()) {
        // Start output buffering to capture HTML content
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- Head content here -->
        </head>
        <body>
            <!-- Body content here -->
            <?php
            // Use a switch statement or if conditions to generate content based on the user role
            switch ($Role) {
                case 'ADMIN':
                    echo '<p>Welcome, Admin! You have access to all features.</p>';
                    echo '<button type="button">Create Report</button>';
                    echo '<button id="add" class="pulse">+</button>';
                    echo '<li><a href="Form.html" target="_self" style="text-decoration: none; color= black;">Begin New Assessment</a></li>';
                    break;
                case 'ANALYST':
                    echo '<p>Welcome, Analyst! You have limited access and are unable to complete assessments.</p>';
                    // Hide the "Create Report" button for Analysts
                    break;
            }
            ?>
        </body>
        </html>
        <?php

        // Get the generated HTML content and turn off output buffering
        $pageContent = ob_get_clean();

        // Output the final HTML content
        echo $pageContent;
    } else {
        // User authentication failed, handle accordingly (e.g., redirect to login page)
        echo "Authentication failed. Please check your credentials.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
