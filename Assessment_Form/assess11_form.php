<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   // Retrieve form data
    $subGuards = $_POST['subGuards'];
    $military = $_POST['Military'];
    $comments = $_POST['BNComments'];

    // SQL query to insert data into securitymanninginfo table
    $sql = "INSERT INTO securitymanninginfo (SubGuards, MilitarySecGuard) VALUES ('$subGuards', '$military')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    //Close connection
      $stmt->close();
    $conn->close();
}
ob_end_flush();
?>