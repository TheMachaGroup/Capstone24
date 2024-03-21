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
    $comments = $_POST['BNComments'];
    $phoneNumber = $_POST['phoneNumber'];
    $numBuildings = $_POST['buildings'];
    $numFloors = $_POST['floors'];
    $unitType = $_POST['unitType'];
    $spaceType = $_POST['spaceType'];
    $groundClosed = $_POST['groundclosed'];
    $gpsLocation = $_POST['gps'];
    $buildingName = $_POST['fname'];

    // Insert data into respective tables
    // Geographic Location Table
    $sql_geo = "INSERT INTO geographiclocation (GeographicLocation, GPSLocation, BuildingName, City, StateProvince, Zip, Country)
                VALUES ('$gpsLocation', '$address', 'fname', '$city', '$state', '$zip', '$country')";

    if ($conn->query($sql_geo) === TRUE) {
        echo "Data inserted in geographiclocation<br>;
    }

    // Unit Requesting Assessment Table
    $sql_unit = "INSERT INTO UnitRequestingAssessment (UserID, BuildingPhoneNumber)
                 VALUES ('$last_id', '$phoneNumber')";

    if ($conn->query($sql_unit) !== TRUE) {
        echo "Error: " . $sql_unit . "<br>" . $conn->error;
    }

    // Residential Housing Gen Info Table
    $sql_residential = "INSERT INTO ResidentialHousingGenInfo (RHAGIID, NumBuildings, NumFloors, UnitType, SpaceType, GroundClosed)
                        VALUES ('$last_id', '$numBuildings', '$numFloors', '$unitType', '$spaceType', '$groundClosed')";

    if ($conn->query($sql_residential) !== TRUE) {
        echo "Error: " . $sql_residential . "<br>" . $conn->error;
    }
    // Close the connection
    $stmt->close();
    $conn->close();

    // Redirect to confirmation page
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit;
}
ob_end_flush();
?>
