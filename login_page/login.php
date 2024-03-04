//The code below connects the login page to the database to validate the credentials in order to log in
<?php
// Establish a connection to the database
$serverName = "tcp:usarcent2024.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "USARCENTHousing-2024-2-21-19-19",
    "Uid" => "USARCENT-HA",
    "PWD" => "TravisBobby2024!",
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    // Protect against SQL injection using parameterized queries
    $params = array($Username, $Password);
    $sql = "SELECT * FROM users WHERE Username=? AND Password=?";
    
    $result = sqlsrv_query($conn, $sql, $params);

    // Check if there is a match
    if ($result === false) {
        // Query failed, handle the error (you might want to log or display an error message)
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($result)) {
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
}

// Close the database connection
sqlsrv_close($conn);
?>
