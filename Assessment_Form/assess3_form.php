<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $totalRooms = $_GET['totalRooms'];
    $totalPeople = $_GET['totalPeople'];
    $occupancyComments = $_GET['occupancyComments'];
    $BNComments = $_GET['BNComments'];
    
    // Prepare and execute SQL statement to insert data into the database
    $stmt = $pdo->prepare("INSERT INTO occupancyinformation (totalRooms, totalPeople, occupancyComments, BNComments) VALUES (:totalRooms, :totalPeople, :occupancyComments, :BNComments)");
    $stmt->bindParam(':totalRooms', $totalRooms);
    $stmt->bindParam(':totalPeople', $totalPeople);
    $stmt->bindParam(':occupancyComments', $occupancyComments);
    $stmt->bindParam(':BNComments', $BNComments);
    
    // Check if the statement was executed successfully
    if ($stmt->execute()) {
        // Redirect to confirmation page
        header("Location: confirmation.html");
        exit();
    } else {
        // If execution fails, handle the error (e.g., display an error message)
        echo "Error: Unable to save data.";
    }
    // Close the connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
