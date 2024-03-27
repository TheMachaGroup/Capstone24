<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Retrieve form data
$perimeterBarriers = $_POST['PB'];
$perimeterLighting = $_POST['PL'];
$gatedEntrance = $_POST['GatedEntrance'];
$gateGuard = $_POST['GateGuard'];
$BNComments = $_POST['BNComments10'];

// SQL query to insert data into perimetersecurityinfo table
$sql = "INSERT INTO perimetersecurityinfo (PerimeterBarriers, PerimeterLighting, GatedEntrance, GateGuard, BNComments) 
VALUES ('$perimeterBarriers', '$perimeterLighting', '$gatedEntrance', '$gateGuard', '$BNComments')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    // If successful, redirect to Form.html
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
} else {
    // If an error occurs, display the error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the database connection when done
mysqli_close($conn);
?>
