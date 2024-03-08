<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form data
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $username = $_POST['Username'];
    $password = $_POST['UserPassword'];

    // Prepare and bind the SQL statement to check if the username already exists
    if ($stmt = $conn->prepare('SELECT UserID, UserPassword FROM users WHERE username = ?')) {
        // Bind parameters (s = string)
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        // Check if the account already exists in the database
        if ($stmt->num_rows > 0) {
            echo 'Username exists, please choose another!';
        } else {
            // Prepare and bind the SQL statement to insert a new account
            if ($stmt = $conn->prepare('INSERT INTO users (FirstName, LastName, Username, UserPassword) VALUES (?, ?, ?, ?)')) {
                // Hash the password using the PHP password_hash function
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Bind parameters (sss = string, string, string)
                $stmt->bind_param('ssss', $firstname, $lastname, $username, $hashedPassword);
                $stmt->execute();
                echo 'You have successfully registered! You can now login!';
            } else {
                // Something is wrong with the SQL statement
                echo 'Could not prepare statement!';
            }
        }
        $stmt->close();
    } else {
        // Something is wrong with the SQL statement
        echo 'Could not prepare statement!';
    }

    // Close the connection
    $conn->close();
}
?>
