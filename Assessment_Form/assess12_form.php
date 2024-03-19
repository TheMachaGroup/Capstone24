<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Retrieve form data
    $maintainKeys = $_POST['Maintain'];
    $roofAccess = $_POST['roofAccess'];
    $groundAccess = $_POST['groundAccess'];
    $publicParking = $_POST['Occupants'];
    $businessOffices = $_POST['BorC'];
    $obstruction = $_POST['Obstruction'];
    $mosquesNearby = $_POST['Mosques'];
    $outsideGroundsDesc = $_POST['groundOpenings'];
    $pointsOfEntryNumber = $_POST['pointEntry'];
    $comments = $_POST['BNComments'];


    // SQL query to insert data into residentialhousinggeninfo table
    $sql = "INSERT INTO residentialhousinggeninfo (EntranceKeyHolders, RoofEntry, OutsideGroundsPresent, PublicParking, BusinessOfficesPresent, Obstruction, MosquesNearby, OutsideGroundsDesc, PointsofEntryNumber, Comments) VALUES ('$maintainKeys', '$roofAccess', '$groundAccess', '$publicParking', '$businessOffices', '$obstruction', '$mosquesNearby', '$outsideGroundsDesc', '$pointsOfEntryNumber', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
       
    // Close the statement and connection
    $stmtStandoff->close();
    $conn->close();
}
ob_end_flush();
?>

