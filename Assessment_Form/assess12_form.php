<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
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
    $BNcomments = $_POST['BNComments12'];

    // SQL query to insert data into residentialhousinggeninfo table
    $sql = "INSERT INTO residentialhousinggeninfo (EntranceKeyHolders, RoofEntry, OutsideGroundsPresent, PublicParking, BusinessOfficesPresent, Obstruction, MosquesNearby, OutsideGroundsDesc, PointsofEntryNumber, Comments) VALUES ('$maintainKeys', '$roofAccess', '$groundAccess', '$publicParking', '$businessOffices', '$obstruction', '$mosquesNearby', '$outsideGroundsDesc', '$pointsOfEntryNumber', '$comments')";
   if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
    }

// Close the connection 
mysqli_close($conn);

?>       
    

