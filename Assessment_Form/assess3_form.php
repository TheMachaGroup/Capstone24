<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    // Retrieve form data from POST request
    $numBuildings = $_POST['buildings'];
    $numFloors = $_POST['floors'];
    $totalRooms = $_POST['totalRooms'];
    $totalPeople = $_POST['totalPeople'];
    $occupancyComments = $_POST['occupancyComments'];
    $BNComments = $_POST['BNComments3'];

    // Prepare and execute SQL statement to insert data into the database
    $sql = "INSERT INTO occupancyinformation (TotalBuildings, NumFloors, TotalAptInComp, TotalOccByPersonnel, Comments, BNComments)
            VALUES ('$numBuildings', '$numFloors', '$totalRooms', '$totalPeople', '$occupancyComments', '$BNComments')";
    if ($conn->query($sql) === TRUE) {
        echo "Successfully inserted into Occupancy information";
}
// Close the database connection when done
mysqli_close($conn);
?>
