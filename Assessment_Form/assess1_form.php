<?php
ob_start();
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
                echo "Record inserted successfully<br>";
                // Redirect to Form.html after successful insertion
                header("Location: https://usarcent.azurewebsites.net/Form.html");
                exit();
            } else {
                echo "Error inserting record into Form table: " . $conn->error . "<br>";
            }
        } else {
            echo "Error inserting record into GeographicLocation table: " . $conn->error . "<br>";
        }
    } else {
        echo "Error inserting record into locationdetails table: " . $conn->error . "<br>";
    }

// Close the database connection when done
mysqli_close($conn);
}
ob_end_flush();
?>
