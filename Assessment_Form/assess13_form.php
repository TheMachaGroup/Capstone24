<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $policeStation = $_POST['policeStation'];
    $policeDistance = $_POST['policeDistance'];
    $policeNumber = $_POST['policeNumber'];
    $policeTime = $_POST['policeTime'];
    $fireStation = $_POST['fireStation'];
    $fireDistance = $_POST['fireDistance'];
    $fireNumber = $_POST['fireNumber'];
    $fireTime = $_POST['fireTime'];
    $hospital = $_POST['Hospital'];
    $hospitalDistance = $_POST['hospitalDistance'];
    $hospitalNumber = $_POST['hospitalNumber'];
    $hospitalTime = $_POST['hospitalTime'];
    $BNComments = $_POST['BNComments'];

    // Insert data into contingency_planning table
    $stmtContingency = $conn->prepare("INSERT INTO contingency_planning (PoliceStation, PoliceDistance, PoliceNumber, PoliceTime, FireStation, FireDistance, FireNumber, FireTime, Hospital, HospitalDistance, HospitalNumber, HospitalTime, BNComments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmtContingency->bind_param("sssssssssssss", $policeStation, $policeDistance, $policeNumber, $policeTime, $fireStation, $fireDistance, $fireNumber, $fireTime, $hospital, $hospitalDistance, $hospitalNumber, $hospitalTime, $BNComments);

    if ($stmtContingency->execute() === TRUE) {
        echo "Data inserted into contingency_planning successfully<br>";

        // Retrieve the ID of the last inserted record
        $contingencyId = $conn->insert_id;

        // Insert data into Form table with reference to contingency_planning table
        $sqlForm = "INSERT INTO Form (ContingencyID) VALUES ('$contingencyId')";

        if ($conn->query($sqlForm) === TRUE) {
            echo "Record inserted successfully into Form table";
        } else {
            echo "Error inserting record into Form table: " . $conn->error;
        }
    } else {
        echo "Error inserting record into contingency_planning table: " . $conn->error;
    }

    // Close the statement and connection
    $stmtContingency->close();
    $conn->close();
}
ob_end_flush();
?>

