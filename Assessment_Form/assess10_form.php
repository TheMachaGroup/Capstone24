<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
   / // Retrieve form data
    $perimeterBarriers = $_POST['PB'];
    $perimeterLighting = $_POST['PL'];
    $gatedEntrance = $_POST['GatedEntrance'];
    $gateGuard = $_POST['GateGuard'];
    $BNcomments = $_POST['BNComments10'];

    // SQL query to insert data into perimetersecurityinfo table
    $sql = "INSERT INTO perimetersecurityinfo (PerimeterBarriers, PerimeterLighting, GatedEntrance, GateGuard, BNComments) VALUES ('$PB, '$PL', '$gatedEntrance', '$gateGuard', '$BNComments)";
         if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
    }

   // Close the database connection when done
mysqli_close($conn);
?>
