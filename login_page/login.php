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

// Get user input from the form
$Username = $_POST['Username'];
$Password = $_POST['Password'];

// Protect against SQL injection
$Username = sqlsrv_real_escape_string($conn, $Username);
$Password = sqlsrv_real_escape_string($conn, $Password);

// Query to check if the username and password match
$sql = "SELECT * FROM users WHERE username=? AND password=?";
$params = array($Username, $Password);
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

$stmt = sqlsrv_query($conn, $sql, $params, $options);

// Check if there is a match
if ($stmt === false) {
    // Query failed, handle the error (you might want to log or display an error message)
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($stmt)) {
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

// Close the database connection
sqlsrv_close($conn);
?>
 
