<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$positiveAspects = $_POST['PosComments']);
$negativeAspects = $_POST['NegComments']);

// Prepare SQL statement to insert data into PositiveNegative table
$sql = "INSERT INTO PositiveNegative (PositiveAspects, NegativeAspects)
VALUES ('$positiveAspects', '$negativeAspects')";
if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}

// Close the connection
mysqli_close($conn);
?>
