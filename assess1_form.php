<?php
ob_start();
echo "connected";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database";

    // Retrieve form data
    $reportName = $_POST['HousingAssessment'];
    $reportdate = $_POST['reportdate'];
    $buildingName = $_POST['fname'];
    $gpsLocation = $_POST['gps'];

    // Insert data into locationdetails table
    $sqlLocation = "INSERT INTO locationdetails (LocationName) VALUES ('$reportName')";

    if ($conn->query($sqlLocation) === TRUE) {
        // Retrieve the ID of the last inserted record
        $locationId = $conn->insert_id;

        // Insert data into GeographicLocation table
        $sqlGeo = "INSERT INTO GeographicLocation (GPSLocation, LocationID) VALUES ('$gpsLocation', '$locationId')";

        if ($conn->query($sqlGeo) === TRUE) {
            // Retrieve the ID of the last inserted record
            $geoLocationId = $conn->insert_id;

            // Insert data into Form table with reference to GeographicLocation and locationdetails tables
            $sqlForm = "INSERT INTO Form (ReportName, BuildingName, GeoLocationID, LocationID, DateOfReport) VALUES ('$reportName', '$buildingName', '$geoLocationId', '$locationId', '$reportdate')";

            if ($conn->query($sqlForm) === TRUE) {
                echo "Record inserted successfully";
                // Redirect to Form.html after successful insertion
                header("Location: Form.html");
                exit();
            } else {
                echo "Error inserting record into Form table: " . $conn->error;
            }
        } else {
            echo "Error inserting record into GeographicLocation table: " . $conn->error;
        }
    } else {
        echo "Error inserting record into locationdetails table: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
ob_end_flush();
?>
