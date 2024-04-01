<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$is_access_secure = $_POST["WSS"];
$securedcontainer = $_POST["securedcontainer"];
$lockedstructure = $_POST["lockedstructure"];
$watersource = $_POST["watersource"];
$capacity = $_POST["capacity"];
$palatable = $_POST["palatable"];
$comments = $_POST["BNComments7"];

// Insert data into the waterstorage table
$sql = "INSERT INTO waterstorage (SecuredAccess, SecuredContainer, LockedStructure, WaterSource, WaterCapacity, Palatable, comments) 
VALUES ('$is_access_secure', '$securedcontainer', '$lockedstructure', '$watersource', '$capacity', '$palatable', '$comments')";
if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
} 

// Close the database connection when done
mysqli_close($conn);
?>
