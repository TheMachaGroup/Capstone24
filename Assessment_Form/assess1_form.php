<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Get the form data
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Username = $_POST['Username'];
    $Password = $_POST['UserPassword'];
    $Role = $_POST['Role'];
    echo "Received form data<br>";

        // Prepare and bind the SQL statement to insert a new account
        $stmt = $conn->prepare('INSERT INTO users (FirstName, LastName, Username, UserPassword, Role) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $FirstName, $LastName, $Username, $Password, $Role);
        
        // Execute the SQL statement
        if ($stmt->execute()) {
            header("Location: https://usarcent.azurewebsites.net/Form.html");
            exit();
        } else {
            echo 'Error submitting form: ' . $stmt->error;
        }
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
