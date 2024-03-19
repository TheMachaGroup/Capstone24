<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   // Retrieve form data
    $is_access_secure = $_GET["WSS"];
    $locked_container_structure = $_GET["LockedWSS"];
    $comments = $_GET["BNComments"];

    // Insert data into the waterstoragesystem table
    $stmt = $pdo->prepare("INSERT INTO waterstoragesystem (securedaccess, lockedcontainer) VALUES (?, ?)");
    $stmt->execute([$is_access_secure, $locked_container_structure]);

    // Get the waterstoragesystem primary key
    $waterstoragesystem_id = $pdo->lastInsertId();

    // Insert data into the form table with the foreign key reference
    $stmt = $pdo->prepare("INSERT INTO form_table (waterstoragesystem, comments) VALUES (?, ?)");
    $stmt->execute([$waterstoragesystem_id, $comments]);
        if ($conn->query($sqlForm) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record into table: " . $conn->error;
        }
    
    // Close the connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
