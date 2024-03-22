<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$monitored_outside = $_POST["monitored_outside"];
$entry_controlled = $_POST["entry_controlled"];
$comments = $_POST["BNComments6"];

// Insert data into the database
$sql = "INSERT INTO entryandcirculationinformation (VehiclesMonitored, EntryControlled, Comments) 
VALUES ('$monitored_outside', '$entry_controlled', '$comments')";
if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}

// Close the database connection when done
mysqli_close($conn);
?>
