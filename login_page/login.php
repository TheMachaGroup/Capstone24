<?php
function validate($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

try {
    $conn = mysqli_init();
    mysqli_real_connect($conn, "usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);
}
catch (Exception $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// Get user input from the form
$Username = validate($_POST['Username']);
$Password = validate($_POST['Password']);

$sql = "SELECT * FROM users WHERE Username='$Username' AND UserPassword='$Password'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Use mysqli_num_rows instead of mysql_num_rows
    if (mysqli_num_rows($result) > 0) {
        echo "hello";
    } else {
        echo "Invalid credentials";
    }
} else {
    echo "Query failed: " . mysqli_error($conn);
}

// Close the database connection
$conn->close();
?>
