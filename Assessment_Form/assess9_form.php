<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    // Retrieve form data
    $parkingDistance = $_POST['ParkingDistance'];
    $reinforced = $_POST['ReinforcedConcBasementOrParking'];
    $shield = $_POST['ShieldedEvacSiteMeters'];
    $reStairwell = $_POST['ReinforcedConcStairwell'];
    $BNcomments = $_POST['BNComments9'];

    // SQL query to insert data into rallypointsinfo table
    $sql = "INSERT INTO rallypointsinfo (ParkingDistance, ReinforcedConcBasementOrParking, ShieldedEvacSiteMeters, ReinforcedConcStairwell, BNComments) VALUES ('$parkingDistance', '$reinforced', '$shield', '$reStairwell', '$BNcomments')";
 if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
} 
      // Close connection
    mysqli_close($conn);
?>
