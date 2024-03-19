<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $is_access_secure = $_POST["WSS"];
    $locked_container_structure = $_POST["LockedWSS"];
    $comments = $_POST["BNComments"];

    // Insert data into the waterstoragesystem table
    $sql = "INSERT INTO waterstoragesystem (securedaccess, lockedcontainer) VALUES ('$is_access_secure', '$locked_container_structure')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error inserting record into waterstoragesystem table: " . $conn->error;
    }

    // Get the waterstoragesystem primary key
    $waterstoragesystem_id = $conn->insert_id;

    // Insert data into the form table with the foreign key reference
    $sql = "INSERT INTO form_table (waterstoragesystem, comments) VALUES ('$waterstoragesystem_id', '$comments')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error inserting record into form_table: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
ob_end_flush();
?>
