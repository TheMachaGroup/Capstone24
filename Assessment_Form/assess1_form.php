<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $reportName = $_POST['HousingAssessment'];
    $reportdate = $_POST['reportdate'];
    $buildingName = $_POST['fname'];
    $gpsLocation = $_POST['gps'];

    // Insert data into locationdetails table
    $sqlLocation = "INSERT INTO locationdetails (LocationName) VALUES ('$reportName')";
echo "successfully inserted"; 
    
?>
