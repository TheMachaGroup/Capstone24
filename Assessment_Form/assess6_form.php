<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $monitored_outside = $_POST["monitored_outside"];
    $entry_controlled = $_POST["entry_controlled"];
    $comments = $_POST["BNComments"];

    // Insert data into the database
    $sql = "INSERT INTO entryandcirculationtable (vehiclesmonitored, entrycontrolled) VALUES ('$monitored_outside', '$entry_controlled')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error inserting into entryandcirculationtable: " . $conn->error;
    }

    // Get the ID of the last inserted row
    $entryandcircID = $conn->insert_id;

    // Insert data into the form table
    $sql = "INSERT INTO form_table (entryandcircID, comments) VALUES ('$entryandcircID', '$comments')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error inserting into form_table: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
ob_end_flush();
?>
