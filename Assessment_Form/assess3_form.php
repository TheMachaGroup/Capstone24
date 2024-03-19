<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $totalRooms = $_POST['totalRooms'];
    $totalPeople = $_POST['totalPeople'];
    $occupancyComments = $_POST['occupancyComments'];
    $BNComments = $_POST['BNComments'];
    
    // Prepare and execute SQL statement to insert data into the database
    $sql = "INSERT INTO occupancyinformation (totalRooms, totalPeople, occupancyComments, BNComments) VALUES ('$totalRooms', '$totalPeople', '$occupancyComments', '$BNComments')";
    
    // Check if the statement was executed successfully
    if ($conn->query($sql) === TRUE) {
        // Redirect to confirmation page
        header("Location: confirmation.html");
        exit();
    } else {
        // If execution fails, handle the error (e.g., display an error message)
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the connection
    $conn->close();
}
ob_end_flush();
?>
