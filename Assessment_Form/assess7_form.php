<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$is_access_secure = $_POST["WSS"];
$locked_container_structure = $_POST["LockedWSS"];
$comments = $_POST["BNComments7"];

// Insert data into the waterstorage table
$sql = "INSERT INTO waterstorage (SecuredAccess, LockedContainer, comments) VALUES ('$is_access_secure', '$locked_container_structure', '$comments')";
if ($conn->query($sql) === TRUE) {
    echo "inserted successfully waterstoragesystem<br>";
} 

// Close the database connection when done
mysqli_close($conn);
?>
