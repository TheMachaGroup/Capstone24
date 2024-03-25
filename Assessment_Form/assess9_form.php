<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$parkingDistance = $_POST['ParkingDistance'];
$reinforcedConcBasementOrParking = $_POST['Reinforced'];
$shieldedEvacSiteMeters = $_POST['ShieldedEvacSiteMeters'];
$reinforcedConcStairwell = $_POST['ReinforcedConcStairwell'];
$BNcomments = $_POST['BNComments9'];

// SQL query to insert data into rallypointsinfo table
$sql = "INSERT INTO rallypointsinfo (ParkingDistance, ReinforcedConcBasementOrParking, ShieldedEvacSiteMeters, ReinforcedConcStairwell, BNComments) 
VALUES ('$parkingDistance', '$reinforcedConcBasementOrParking', '$shieldedEvacSiteMeters', '$reinforcedConcStairwell', '$BNcomments')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // If successful, redirect to Form.html
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
} else {
    // If an error occurs, display the error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
mysqli_close($conn);
?>
