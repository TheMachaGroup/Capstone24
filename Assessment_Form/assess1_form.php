<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$reportdate = $_POST['reportdate'];
$reportname = $_POST['reportname'];
$securitymonitor = $_POST['securitymonitor'];
$sassupervisor = $_POST['sassupervisor'];
$signatures = $_POST['signatures'];

//insert into annual assessment table
$sql = "INSERT INTO annualassessment (SecurityMonitor, SASSupervisor, Signatures) VALUES ('$securitymonitor', '$sassupervisor', '$signatures' )";

// Insert data into Form table
$sqlForm = "INSERT INTO form (DateofReport, ReportName) VALUES ('$reportdate', '$reportname')";
if ($conn->query($sqlForm) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}

// Close the database connection when done
mysqli_close($conn);
?>
