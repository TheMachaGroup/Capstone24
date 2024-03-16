<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $maintain = $_POST['Maintain'];
    $roofAccess = $_POST['roofAccess'];
    $groundAccess = $_POST['groundAccess'];
    $occupants = $_POST['Occupants'];
    $borc = $_POST['BorC'];
    $obstruction = $_POST['Obstruction'];
    $mosques = $_POST['Mosques'];
    $groundOpenings = $_POST['groundOpenings'];
    $pointEntry = $_POST['pointEntry'];
    $BNComments = $_POST['BNComments'];

    // Insert data into standoff_information table
    $sqlStandoff = "INSERT INTO standoff_information (nObstructions, sObstructions, eObstructions, wObstructions, BNComments) VALUES ('$maintain', '$roofAccess', '$groundAccess', '$occupants', '$borc', '$obstruction', '$mosques', '$groundOpenings', '$pointEntry', '$BNComments')";

    if ($conn->query($sqlStandoff) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record into standoff_information table: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
ob_end_flush();
?>

