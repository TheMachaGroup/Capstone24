<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

// Retrieve form data
    $monitored_outside = $_GET["monitored_outside"];
    $entry_controlled = $_GET["entry_controlled"];
    $comments = $_GET["BNComments"];

    // Insert data into the database
    $stmt = $pdo->prepare("INSERT INTO entryandcirculationtable (vehiclesmonitored, entrycontrolled) VALUES (?, ?)");
    $stmt->execute([$monitored_outside, $entry_controlled]);

    // Get the ID of the last inserted row
    $entryandcircID = $pdo->lastInsertId();

    // Insert data into the form table
    $stmt = $pdo->prepare("INSERT INTO form_table (entryandcircID, comments) VALUES (?, ?)");
    $stmt->execute([$entryandcircID, $comments]);

        if ($conn->query($sqlForm) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting table: " . $conn->error;
        }
   
    // Close the connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
