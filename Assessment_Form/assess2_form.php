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
    $gpsLocation = $_POST['gps'];
    $buildingName = $_POST['fname'];

    // Insert data into respective tables
    // Geographic Location Table
    $sql_geo = "INSERT INTO geographiclocation (GeographicLocation, Street, BuildingName, City, StateProvince, Zip, Country, Comments)
                VALUES ('$gpsLocation', '$address', '$buildingName', '$city', '$state', '$zip', '$country', '$comments')";

    if ($conn->query($sql_geo) === TRUE) {
        echo "Data inserted in geographiclocation<br>;
    }
  
// Close the database connection when done
mysqli_close($conn);
?>
