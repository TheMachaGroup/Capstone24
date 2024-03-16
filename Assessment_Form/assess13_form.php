<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   // Retrieve form data
$nPoliceStation = $_POST['policeStation'];
$nPoliceDistance = $_POST['policeDistance'];
$nPoliceNumber = $_POST['policeNumber'];
$nPoliceTime = $_POST['policeTime'];
$nFireStation = $_POST['fireStation'];
$nFireDistance = $_POST['fireDistance'];
$nFireNumber = $_POST['fireNumber'];
$nFireTime = $_POST['fireTime'];
$nHospital = $_POST['Hospital'];
$nHospitalDistance = $_POST['hospitalDistance'];
$nHospitalNumber = $_POST['hospitalNumber'];
$nHospitalTime = $_POST['hospitalTime'];
$nBNComments = $_POST['BNComments'];

// Prepare and execute SQL statement to insert data into the database
$stmt = $pdo->prepare("INSERT INTO contingency_planning (PoliceStation, PoliceDistance, PoliceNumber, PoliceTime, FireStation, FireDistance, FireNumber, FireTime, Hospital, HospitalDistance, HospitalNumber, HospitalTime, BNComments) VALUES (:policeStation, :policeDistance, :policeNumber, :policeTime, :fireStation, :fireDistance, :fireNumber, :fireTime, :Hospital, :hospitalDistance, :hospitalNumber, :hospitalTime, :BNComments)");
$stmt->bindParam(':policeStation', $nPoliceStation);
$stmt->bindParam(':policeDistance', $nPoliceDistance);
$stmt->bindParam(':policeNumber', $nPoliceNumber);
$stmt->bindParam(':policeTime', $nPoliceTime);
$stmt->bindParam(':fireStation', $nFireStation);
$stmt->bindParam(':fireDistance', $nFireDistance);
$stmt->bindParam(':fireNumber', $nFireNumber);
$stmt->bindParam(':fireTime', $nFireTime);
$stmt->bindParam(':Hospital', $nHospital);
$stmt->bindParam(':hospitalDistance', $nHospitalDistance);
$stmt->bindParam(':hospitalNumber', $nHospitalNumber);
$stmt->bindParam(':hospitalTime', $nHospitalTime);
$stmt->bindParam(':BNComments', $nBNComments);

$stmt->execute();


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

