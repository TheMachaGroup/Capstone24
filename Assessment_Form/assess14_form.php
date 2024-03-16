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

    // Prepare and execute SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO positive_negative_aspects (BNComments) VALUES (?)");
    $stmt->bind_param("s", $BNComments);

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

