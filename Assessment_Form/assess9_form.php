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
    $BNcomments = $_POST['BNComments9'];


    // SQL query to insert data into rallypointsinfo table
    $sql_RallyPointsInfo = "INSERT INTO rallypointsinfo (ParkingDistance, ReinforcedConcBasementOrParking, ShieldedEvacSiteMeters, ReinforcedConcStairwell) VALUES ('$complexDistance', '$reinforced', '$shield', '$reStairwell')";
if ($conn->query($sql_RallyPointsInfo) === TRUE) {
    echo "Data inserted in location details<br>";
} 

 // Insert data into Form table with reference to rallypointsinfo table
            $sql_form = "INSERT INTO form (DateofReport, RallyPointsID) VALUES ('$reportdate', '$rallyPointsID')";
            if ($conn->query($sql_form) === TRUE) {
                echo "Data inserted into Form table<br>";
            } 

      // Close connection
    mysqli_close($conn);

?>
