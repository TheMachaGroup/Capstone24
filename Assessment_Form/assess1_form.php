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
$buildingName = $_POST['fname'];
$gpsLocation = $_POST['gps'];

// Insert data into locationdetails table
$sqlLocation = "INSERT INTO locationdetails (LocationName) VALUES ('$reportName')";
if ($conn->query($sqlLocation) === TRUE) {
    echo "Data inserted in location details<br>";
} else {
    echo "Error inserting record into locationdetails table: " . $conn->error . "<br>";
}

// Insert data into GeographicLocation table
$sqlGeo = "INSERT INTO geographiclocation (GeographicLocation) VALUES ('$gpsLocation')";
if ($conn->query($sqlGeo) === TRUE) {
    echo "Data inserted into GeographicLocation<br>";
} else {
    echo "Error inserting record into GeographicLocation table: " . $conn->error . "<br>";
}


// Insert data into Form table with reference to GeographicLocation and locationdetails tables
$sqlForm = "INSERT INTO form (ReportName, BuildingName, DateOfReport) VALUES ('$reportName', '$buildingName', '$reportdate')";
if ($conn->query($sqlForm) === TRUE) {
    echo "Data inserted into Form table<br>";
} else {
    echo "Error inserting record into Form table: " . $conn->error . "<br>";
}

// Close the database connection when done
mysqli_close($conn);
?>
