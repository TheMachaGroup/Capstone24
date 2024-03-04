//The code below connects the login page to the database to validate the credentials in order to log in
<?php
try {
    $conn = new PDO(
        "sqlsrv:server = tcp:usarcent2024.database.windows.net,1433; Database = USARCENTHousing-2024-2-21-19-19",
        "USARCENT-HA",
        "{TravisBobby2024!}"
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Log the error instead of directly printing it
    error_log("Error connecting to SQL Server: " . $e->getMessage());
    // Display a generic error message to the user
    print("Error connecting to SQL Server.");
    die();
}

// Get user input from the form
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

// Protect against SQL injection
$Username = $conn->quote($Username);
$Password = $conn->quote($Password);

// Query to check if the username and password match
$sql = "SELECT * FROM users WHERE Username=$Username AND Password=$Password";
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
    header("Location: index.html?error=" . urlencode($error_message));
    exit();
}

// Close the database connection (optional, as PDO will automatically close the connection when the script ends)
// $conn = null;
?>
