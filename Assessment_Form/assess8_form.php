<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $surrounding_population = $_POST["SP"];
    $crime_violence_history = $_POST["Crime"];
    $comments = $_POST["BNComments"];

    // Insert data into the demographicsinfo table
    $sql = "INSERT INTO demographicsinfo (SurroundingPop, CrimeViolenceHistory) VALUES ('$surrounding_population', '$crime_violence_history')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully<br>";
    } else {
        echo "Error inserting record into demographicsinfo table: " . $conn->error;
    }

    // Get the demographicsinfo primary key
    $demographicsID = $conn->insert_id;

    // Insert data into the form table with the foreign key reference
    $sql = "INSERT INTO form_table (demographicsID, comments) VALUES ('$demographicsID', '$comments')";
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
