//The code below connects the login page to the database to validate the credentials in order to log in
<?php
try {
    $con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
mysqli_real_connect($conn, "usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306, MYSQLI_CLIENT_SSL);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// Get user input from the form
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

// Protect against SQL injection
$Username = $conn->quote($Username);
$Password = $conn->quote($Password);

// Query to check if the username and password match
$sql = "SELECT * FROM Users WHERE Username=$Username AND Password=$Password";
$result = $conn->query($sql);

// Check if there is a match
if ($result === false) {
    // Query failed, handle the error (you might want to log or display an error message)
    error_log("Error executing query: " . print_r($conn->errorInfo(), true));
    print("Error validating credentials.");
    die();
}

if ($result->rowCount() > 0) {
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

// Close the database connection (optional, as PDO will automatically close the connection when the script ends)
// $conn = null;
?>
