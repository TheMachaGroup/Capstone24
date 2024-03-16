<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $maintain = $_POST['Maintain'];
    $roofAccess = $_POST['roofAccess'];
    $groundAccess = $_POST['groundAccess'];
    $occupants = $_POST['Occupants'];
    $borc = $_POST['BorC'];
    $obstruction = $_POST['Obstruction'];
    $mosques = $_POST['Mosques'];
    $groundOpenings = $_POST['groundOpenings'];
    $pointEntry = $_POST['pointEntry'];
    $BNComments = $_POST['BNComments'];

 if ($stmtStandoff->execute() === TRUE) {
        echo "Data inserted into standoff_information successfully<br>";

        // Retrieve the ID of the last inserted record
        $standoffId = $conn->insert_id;

        // Insert data into Form table with reference to standoff_information table
        $sqlForm = "INSERT INTO Form (StandoffID) VALUES ('$standoffId')";

        if ($conn->query($sqlForm) === TRUE) {
            echo "Record inserted successfully into Form table";
        } else {
            echo "Error inserting record into Form table: " . $conn->error;
        }
    } else {
        echo "Error inserting record into standoff_information table: " . $conn->error;
    }

    // Close the statement and connection
    $stmtStandoff->close();
    $conn->close();
}
ob_end_flush();
?>

