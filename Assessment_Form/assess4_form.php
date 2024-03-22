<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$nObstructions = $_POST['nObstructions'];
$nsoa = $_POST['nsoa'];
$sObstructions = $_POST['sObstructions'];
$ssoa = $_POST['ssoa'];
$eObstructions = $_POST['eObstructions'];
$esoa = $_POST['esoa'];
$wObstructions = $_POST['wObstructions'];
$wsoa = $_POST['wsoa'];
$BNComments = $_POST['BNComments4'];
    
// Prepare and execute SQL statement to insert data into the database
$sql = "INSERT INTO standoffinformation (North, NorthIdentityObstruct, South, SouthIdentityObstruct, East, EastIdentityObstruct, West, WestIdentityObstruct, Comments) 
VALUES ('$nsoa', '$nObstructions', '$ssoa', '$sObstructions', '$esoa', '$eObstructions', '$wsoa', '$wObstructions', '$BNComments')";
// Check if the statement was executed successfully
if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}

// Close the connection
$conn->close();
?>
