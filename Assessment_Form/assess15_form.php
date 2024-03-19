<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";
 // Retrieve form data
    $rsoComments = $_POST['RSO'];
    $miscellaneousInfo = $_POST['ai'];
    $bnComments = $_POST['BNComments'];

    // Prepare SQL statement to insert data into annualassessment table
    $sql = "INSERT INTO annualassessment (RSOComments, MiscellaneousInfo, BNComments) VALUES ('$rsoComments', '$miscellaneousInfo', '$bnComments')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
