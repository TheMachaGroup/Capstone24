<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$surrounding_population = $_POST["SP"];
$crime_violence_history = $_POST["Crime"];
$comments = $_POST["BNComments8"];

// Insert data into the demographicsinfo table
$sql = "INSERT INTO demographicsinfo (SurroundingPop, CrimeViolenceHistory, comments) 
VALUES ('$surrounding_population', '$crime_violence_history', '$comments')";
if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
} 

// Close the database connection when done
mysqli_close($conn);
?>
