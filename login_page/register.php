<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (FirstName, LastName, Username, UserPassword) VALUES (?, ?, ?, ?)");

    // Check for preparation error
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Get the form data
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $username = $_POST['Username'];
    $password = $_POST['UserPassword'];

    // Bind parameters to the statement
    $stmt->bind_param("ssss", $firstname, $lastname, $username, $password);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "New account created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
