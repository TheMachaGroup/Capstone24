<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   // Retrieve form data
    $complexDistance = $_POST['ComplexDistance'];
    $reinforced = $_POST['Reinforced'];
    $shield = $_POST['Shield'];
    $reStairwell = $_POST['ReStairwell'];
    $comments = $_POST['BNComments'];

   // Insert data into respective tables
    $sql1 = "INSERT INTO ParkingDistance (Distance) VALUES ('$complexDistance')";
    $sql2 = "INSERT INTO Reinforcement (BasementOrParkingArea) VALUES ('$reinforced')";
    $sql3 = "INSERT INTO EvacuationSite (SiteLocation) VALUES ('$shield')";
    $sql4 = "INSERT INTO Stairwell (Description) VALUES ('$reStairwell')";
    $sql5 = "INSERT INTO Comments (Comment) VALUES ('$comments')";

   // Execute queries
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE && $conn->query($sql5) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

  
// Close the connection
    $stmt->close();
    $conn->close();
}
  ob_end_flush();
?>
