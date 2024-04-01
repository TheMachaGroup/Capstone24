<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$comments = $_POST['BNComments2'];
$buildingName = $_POST['fname'];
$reportName = $_POST['HousingAssessment'];
$phoneNumber = $_POST['phoneNumber'];
$unitType = $_POST['unitType'];
$spaceType = $_POST['spaceType'];

// Insert data into locationdetails table
$sqlLocation = "INSERT INTO locationdetails (LocationName, PhoneNumber, TypeofResidence, TypeofUnit) VALUES ('$reportName', '$phoneNumber', '$unitType', '$spaceType')";

// Geographic Location Table
$sql_geo = "INSERT INTO geographiclocation (Street, BuildingName, City, StateProvince, Zip, Country, Comments) 
VALUES ('$address', '$buildingName', '$city', '$state', '$zip', '$country', '$comments')";
if ($conn->query($sql_geo) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}
  
// Close the database connection when done
mysqli_close($conn);
?>
