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

if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['Username'] === $Username && $row['UserPassword'] === $Password) {
            header("Location: https://usarcent.azurewebsites.net/form.html");
            exit();
    } else {
        echo "Invalid credentials";
    }
} else {
    echo "Query failed: " . mysqli_error($conn);
}

// Close the database connection
$conn->close();
?>
