//The code below connects the login page to the database to validate the credentials in order to log in
<?php
echo "testing";
try {
    $conn = mysqli_init();
    mysqli_real_connect($conn, "usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
// Example query
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    // Handle the error
    echo "Error executing query: " . $conn->error;
} else {
    // Fetch and display the data
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["UserID"] . " - Name: " . $row["Username"] . "<br>";
    }
}
    
  ?> 
