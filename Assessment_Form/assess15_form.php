<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $BNComments = $_POST['BNComments'];
    $miscellaneousInfo = $_POST['ai'];

    // Prepare and execute SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO annual_assessment_security_office_comments (BNComments, MiscellaneousInfo) VALUES (?, ?)");
    $stmt->bind_param("ss", $BNComments, $miscellaneousInfo);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>

