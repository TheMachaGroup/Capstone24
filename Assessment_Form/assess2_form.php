<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

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

    // Insert data into respective tables
    // Geographic Location Table
    $sql_geo = "INSERT INTO GeographicLocation (GPS, Address, City, State, Zip, Country)
                VALUES ('gps_value', '$address', '$city', '$state', '$zip', '$country')";

    if ($conn->query($sql_geo) === TRUE) {
        $last_id = $conn->insert_id; // Get last inserted ID for foreign key reference
    } else {
        echo "Error: " . $sql_geo . "<br>" . $conn->error;
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
