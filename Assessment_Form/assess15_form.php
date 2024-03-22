<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 // Retrieve form data
    $rsoComments = $_POST['RSO'];
    $miscellaneousInfo = $_POST['ai'];
    $BNComments = $_POST['BNComments13'];

    // Prepare SQL statement to insert data into annualassessment table
    $sql = "INSERT INTO annualassessment (RSOComments, MiscellaneousInfo, BNComments) VALUES ('$rsoComments', '$miscellaneousInfo', '$bnComments')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } 

  // Close the database connection when done
mysqli_close($conn);
?>
