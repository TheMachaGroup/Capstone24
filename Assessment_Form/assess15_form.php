<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve form data
    $BNComments = $_GET['BNComments'];
    $miscellaneousInfo = $_GET['ai'];

    // Connect to the database
    $pdo = new PDO("mysql:host=usarcent-server.mysql.database.azure.com;dbname=usarcent-database", "thpgbqeide", "0LB5E265UCUE1D5E$");
    
    // Prepare and execute SQL statement to insert data into the database
    $stmt = $pdo->prepare("INSERT INTO annual_assessment_comments (Comments, MiscellaneousInfo) VALUES (:BNComments, :miscellaneousInfo)");
    $stmt->bindParam(':BNComments', $BNComments);
    $stmt->bindParam(':miscellaneousInfo', $miscellaneousInfo);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $stmt->errorInfo()[2];
    }

    // Close the connection
    $pdo = null;
}
ob_end_flush();
?>


