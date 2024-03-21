<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$parkingArea = $_POST['ParkingArea'];
$parkSec = $_POST['ParkSec'];
$light = $_POST['Light'];
$pComments = $_POST['pComments'];

// Perform SQL insertion
$sql = "INSERT INTO parkinginformation (LocationOfParking, SecurityForParking, Lighting, Comments)
        VALUES ('$parkingArea', '$parkSec', '$light', '$pComments')";
if ($conn->query($sql) === TRUE) {
    echo "inserted into parking information table";
}
  
// Close the database connection when done
mysqli_close($conn);
?>
