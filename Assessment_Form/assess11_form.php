<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
   // Retrieve form data
    $subGuards = $_POST['subGuards'];
    $military = $_POST['Military'];
    $comments = $_POST['BNComments11'];

    // SQL query to insert data into securitymanninginfo table
    $sql_secman = "INSERT INTO securitymanninginfo (SubGuards, MilitarySecGuard) VALUES ('$subGuards', '$military')";

    if ($conn->query($sql_secman) === TRUE) {
        echo "Data inserted in Security Manning Info Tablebr>";
    }
    
    // Close the database connection 
mysqli_close($conn);
?>
