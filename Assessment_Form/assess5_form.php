<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $parkingArea = $_POST['ParkingArea'];
    $parkSec = $_POST['ParkSec'];
    $light = $_POST['Light'];
    $pComments = $_POST['pComments'];
    $bnComments = $_POST['BNComments'];

    // Perform SQL insertion
    $sql = "INSERT INTO parkinginformation (LocationOfParking, SecurityForParking, Lighting, Comments)
            VALUES ('$parkingArea', '$parkSec', '$light', '$pComments')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting into table: " . $conn->error;
    }
  
    // Close the connection
    $conn->close();
}
ob_end_flush();
?>
