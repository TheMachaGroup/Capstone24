<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

      // Retrieve form data
    $subcontractedGuards = $_POST['subGuards'];
    $militarySecurityGuards = $_POST['Military'];
    $comments = $_POST['BNComments'];

    // Insert data into SecurityManning table
    $sqlSecurityManning = "INSERT INTO SecurityManning (SubcontractedGuards, MilitarySecurityGuards, Comments) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sqlSecurityManning);
    $stmt->bind_param("sss", $subcontractedGuards, $militarySecurityGuards, $comments);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record into SecurityManning table: " . $stmt->error;
    }

  
   // Close the connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
