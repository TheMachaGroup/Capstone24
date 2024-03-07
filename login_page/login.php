//The code below connects the login page to the database to validate the credentials in order to log in
<?php

try {
    $conn = mysqli_init();
    mysqli_real_connect($conn, "usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// Get user input from the form
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

// Protect against SQL injection using prepared statements
$stmt = $conn->prepare("SELECT * FROM Users WHERE Username=? AND Password=?");
$stmt->bind_param("ss", $Username, $Password);
$stmt->execute();

// Check if there is a match
$result = $stmt->get_result();

if ($result === false) {
    // Query failed, handle the error (you might want to log or display an error message)
    error_log("Error executing query: " . print_r($stmt->errorInfo(), true));
    print("Error validating credentials.");
    die();
}

if ($result->num_rows > 0) {
    // Successful login
    header("Location: form.html");
    exit();
} else {
    // Invalid login credentials
    $error_message = "Invalid login credentials";
    // Pass the error message back to the login page
    header("Location: index.html");
    exit();
}

// Close the database connection
$stmt->close();
$conn->close();
?>
