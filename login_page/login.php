//The code below connects the login page to the database to validate the credentials in order to log in
<?php
try {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
catch (PDOException $e) {
    print("Error connecting to MySQL Server.");
    die(print_r($e));
}

/ Get user input from the form
$Username = $_POST['Username'] ?? '';
$Password = $_POST['Password'] ?? '';

// Construct the query (without considering SQL injection)
$sql = "SELECT * FROM Users WHERE Username='$Username' AND Password='$Password'";
$result = $conn->query($sql);

// Check if there is a match
if ($result->num_rows > 0) {
    // Successful login
    header("Location: form.html");
    exit();
} else {
    // Invalid login credentials
    header("Location: index.html");
    exit();
}

// Close the database connection
$conn->close();
?>
