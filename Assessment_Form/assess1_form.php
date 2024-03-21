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
echo "data inserted"; 

// Close the database connection when done
mysqli_close($conn);
}
?>
