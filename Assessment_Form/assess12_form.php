<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$entranceKeyHolders = $_POST['entranceKeyHolders'];
$roofEntry = $_POST['roofEntry'];
$groundAccess = $_POST['groundAccess'];
$publicParking = $_POST['publicParking'];
$businessOfficesPresent = $_POST['BusinessOficesPresent'];
$obstruction = $_POST['Obstruction'];
$mosquesNearby = $_POST['MosquesNearby'];
$outsideGroundsPresent = $_POST['OutsideGroundsPresent'];
$pointsOfEntryNumber = $_POST['PointsofEntryNumber'];
$BNComments = $_POST['BNComments12'];

// SQL query to insert data into residentialhousinggeninfo table
$sql = "INSERT INTO residentialhousinggeninfo (EntranceKeyHolders, RoofEntry, OutsideGroundsPresent, PublicParking, BusinessOfficesPresent, Obstruction, MosquesNearby, PointsofEntryNumber, Comments)
VALUES ('$entranceKeyHolders', '$roofEntry', '$groundAccess', '$outsideGroundsPresent', '$publicParking', '$businessOfficesPresent', '$obstruction', '$mosquesNearby', '$pointsOfEntryNumber', '$BNComments')";

if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}

// Close the connection 
mysqli_close($conn);

?>       
    
