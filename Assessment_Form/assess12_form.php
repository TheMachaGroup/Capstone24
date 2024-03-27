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
$publicParking = $_POST['PublicParking'];
$businessOfficesPresent = $_POST['BusinessOfficesPresent'];
$obstruction = $_POST['obstruction'];
$mosquesNearby = $_POST['MosquesNearby'];
$outsideGroundsPresent = $_POST['OutsideGroundsPresent'];
$pointsOfEntryNumber = $_POST['PointsofEntryNumber'];
$BNComments = $_POST['BNComments12'];

// SQL query to insert data into residentialhousinggeninfo table
$sql = "INSERT INTO residentialhousinggeninfo (EntranceKeyHolders, RoofEntry, GroundAccess, PublicParking, BusinessOfficesPresent, Obstruction, MosquesNearby, OutsideGroundsPresent, PointsofEntryNumber, Comments)
VALUES ('$entranceKeyHolders', '$roofEntry', '$groundAccess', '$publicParking', '$businessOfficesPresent', '$obstruction', '$mosquesNearby', '$outsideGroundsPresent','$pointsOfEntryNumber', '$BNComments')";

if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}

// Close the connection 
mysqli_close($conn);

?>       
    
