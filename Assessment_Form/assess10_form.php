<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   // Retrieve form data
    $perimeterBarriers = $_POST['PB'];
    $perimeterLighting = $_POST['PL'];
    $gatedEntrance = $_POST['GatedEntrance'];
    $gateGuard = $_POST['GateGuard'];
    $comments = $_POST['BNComments'];

    // Insert data into PerimeterSecurity table
    $sqlPerimeterSecurity = "INSERT INTO PerimeterSecurity (PerimeterBarriers, PerimeterLighting, GatedEntrance, GateGuard, Comments) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlPerimeterSecurity);
    $stmt->bind_param("sssss", $perimeterBarriers, $perimeterLighting, $gatedEntrance, $gateGuard, $comments);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record into PerimeterSecurity table: " . $stmt->error;
    }
    // Close connection
    $conn->close();
}
ob_end_flush();
?>
