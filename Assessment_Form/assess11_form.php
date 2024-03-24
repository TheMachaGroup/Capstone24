<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
   // Retrieve form data
    $subGuards = $_POST['subGuards'];
    $militarySecGuard = $_POST['MilitarySecGuard'];
    $BNcomments = $_POST['BNComments11'];

    // SQL query to insert data into securitymanninginfo table
    $sql = "INSERT INTO securitymanninginfo (SubGuards, MilitarySecGuard, Comments) VALUES ('$subGuards', '$militarySecGuard', '$BNComments')";
    if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
    }
    
    // Close the database connection 
mysqli_close($conn);
?>
