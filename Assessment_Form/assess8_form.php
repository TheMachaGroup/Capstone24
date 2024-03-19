<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $surrounding_population = $_GET["SP"];
    $crime_violence_history = $_GET["Crime"];
    $comments = $_GET["BNComments"];

    // Insert data into the demographicsinfo table
    $stmt = $pdo->prepare("INSERT INTO demographicsinfo (SurroundingPop, CrimeViolenceHistory) VALUES (?, ?)");
    $stmt->execute([$surrounding_population, $crime_violence_history]);

    // Get the demographicsinfo primary key
    $demographicsID = $pdo->lastInsertId();

    // Insert data into the form table with the foreign key reference
    $stmt = $pdo->prepare("INSERT INTO form_table (demographicsID, comments) VALUES (?, ?)");
    $stmt->execute([$demographicsID, $comments]);
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
