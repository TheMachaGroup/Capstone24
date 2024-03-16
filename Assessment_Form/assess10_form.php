<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

        // Retrieve form data
    $perimeterBarriers = $conn->real_escape_string($_POST['PB']);
    $perimeterLighting = $conn->real_escape_string($_POST['PL']);
    $gatedEntrance = $conn->real_escape_string($_POST['GatedEntrance']);
    $gateGuard = $conn->real_escape_string($_POST['GateGuard']);
    $comments = $conn->real_escape_string($_POST['BNComments']);

        // Insert data into respective tables
    $sql1 = "INSERT INTO PerimeterBarriers (TypeOfConstruction) VALUES ('$perimeterBarriers')";
    $sql2 = "INSERT INTO PerimeterLighting (Description) VALUES ('$perimeterLighting')";
    $sql3 = "INSERT INTO GatedEntrance (Description) VALUES ('$gatedEntrance')";
    $sql4 = "INSERT INTO GateGuard (Description) VALUES ('$gateGuard')";
    $sql5 = "INSERT INTO Comments (Comment) VALUES ('$comments')";

       // Execute queries
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE && $conn->query($sql5) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
ob_end_flush();
?>
