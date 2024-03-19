<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $complexDistance = $_POST['ComplexDistance'];
    $reinforced = $_POST['Reinforced'];
    $shield = $_POST['Shield'];
    $reStairwell = $_POST['ReStairwell'];
    $comments = $_POST['BNComments'];


    // SQL query to insert data into rallypointsinfo table
    $sql = "INSERT INTO rallypointsinfo (ParkingDistance, ReinforcedConcBasementOrParking, ShieldedEvacSiteMeters, ReinforcedConcStairwell) VALUES ('$complexDistance', '$reinforced', '$shield', '$reStairwell')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  
// Close the connection
    $stmt->close();
    $conn->close();
}
  ob_end_flush();
?>
