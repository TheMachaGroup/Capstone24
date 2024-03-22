<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$reportName = $_POST['HousingAssessment'];
$reportdate = $_POST['reportdate'];
$phoneNumber = $_POST['phoneNumber'];
$unitType = $_POST['unitType'];
$spaceType = $_POST['spaceType'];

// Insert data into locationdetails table
$sqlLocation = "INSERT INTO locationdetails (LocationName, PhoneNumber, TypeofResidence, TypeofUnit) VALUES ('$reportName', '$phoneNumber', '$unitType', '$spaceType')";


// Insert data into Form table with reference to GeographicLocation and locationdetails tables
$sqlForm = "INSERT INTO form (DateofReport) VALUES ('$reportdate')";
if ($conn->query($sqlForm) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}

// Close the database connection when done
mysqli_close($conn);
?>
