<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Retrieve form data
$rsoComments = $_POST['RSOComments'];
$miscellaneousInfo = $_POST['miscellaneousInfo'];

// Prepare SQL statement to insert data into annualassessment table
$sql = "INSERT INTO annualassessment (RSOComments, MiscellaneousInfo) 
VALUES ('$rsoComments', '$miscellaneousInfo')";
if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
} 

// Close the database connection when done
mysqli_close($conn);
?>
