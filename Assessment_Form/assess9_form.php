<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    // Retrieve form data
    $complexDistance = $_POST['ComplexDistance'];
    $reinforced = $_POST['Reinforced'];
    $shield = $_POST['Shield'];
    $reStairwell = $_POST['ReStairwell'];
    $comments = $_POST['BNComments'];


    // SQL query to insert data into rallypointsinfo table
    $sqlRallyPointsInfo = "INSERT INTO rallypointsinfo (ParkingDistance, ReinforcedConcBasementOrParking, ShieldedEvacSiteMeters, ReinforcedConcStairwell) VALUES ('$complexDistance', '$reinforced', '$shield', '$reStairwell')";
if ($conn->query($sqlRallyPointsInfo) === TRUE) {
    echo "Data inserted in location details<br>";
} else {
    echo "Error inserting record into rallypointsinfo table: " . $conn->error . "<br>";
}

      // Close connection
    mysqli_close($conn);

?>
