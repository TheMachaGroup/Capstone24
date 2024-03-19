<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   // Retrieve form data for police
    $policeStation = $_POST['policeStation'];
    $policeDistance = $_POST['policeDistance'];
    $policeNumber = $_POST['policeNumber'];
    $policeTime = $_POST['policeTime'];

    // Retrieve form data for fire
    $fireStation = $_POST['fireStation'];
    $fireDistance = $_POST['fireDistance'];
    $fireNumber = $_POST['fireNumber'];
    $fireTime = $_POST['fireTime'];

   
    // SQL query to insert data into policeforce table
    $sqlPolice = "INSERT INTO policeforce (PoliceForce, Distance, PhoneNumber, PoliceLocation) VALUES ('$policeStation', '$policeDistance', '$policeNumber', '$policeTime')";

    if ($conn->query($sqlPolice) === TRUE) {
        echo "New police record created successfully";
    } else {
        echo "Error: " . $sqlPolice . "<br>" . $conn->error;
    }

    // SQL query to insert data into firedepartment table
    $sqlFire = "INSERT INTO firedepartment (FireDepartment, Distance, PhoneNumber, FireLocation) VALUES ('$fireStation', '$fireDistance', '$fireNumber', '$fireTime')";

    if ($conn->query($sqlFire) === TRUE) {
        echo "New fire record created successfully";
    } else {
        echo "Error: " . $sqlFire . "<br>" . $conn->error;
    }

    // Close the statement and connection
    $stmtContingency->close();
    $conn->close();
}
ob_end_flush();
?>

