//The code below connects the login page to the database to validate the credentials in order to log in
<?php
// Establish a connection to the database
$servername = "tcp:usarcent2024.database.windows.net,1433";
$Username = "USARCENT-HA";
$Password = "TravisBobby2024!";
$dbname = "USARCENTHousing-2024-2-21-19-19";

$conn = new mysqli($servername, $Username, $Password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$Username = $_POST['Username'];
$Password = $_POST['Password'];

// Protect against SQL injection
$Username = mysqli_real_escape_string($conn, $Username);
$Password = mysqli_real_escape_string($conn, $Password);

// Query to check if the username and password match
$sql = "SELECT * FROM users WHERE username='$Username' AND password='$Password'";
$result = $conn->query($sql);

// Check if there is a match
if ($result->num_rows > 0) {
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
$conn->close();
?>
 
