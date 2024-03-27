<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data for police
$policeStation = $_POST['policeStation'];
$policeDistance = $_POST['policeDistance'];
$policeNumber = $_POST['policeNumber'];
$policeTime = $_POST['policeTime'];

// Retrieve form data for fire
$fireDepartment = $_POST['fireDepartment'];
$fireDistance = $_POST['fireDistance'];
$fireNumber = $_POST['fireNumber'];
$fireTime = $_POST['fireTime'];

//Retrieve form data for hospital
$hospital = $_POST['hospital'];
$Distance = $_POST['distance'];
$phoneNumber = $_POST['phoneNumber'];
$hospitalResponseTime = $_POST['hospitalTime'];

   
// SQL query to insert data into policeforce table
$sql = "INSERT INTO policeforce (PoliceStation, PoliceDistance, PoliceNumber, PoliceTime) 
VALUES ('$policeStation', '$policeDistance', '$phoneNumber', '$policeTime')";

// SQL query to insert data into firedepartment table
$sql = "INSERT INTO firedepartment (FireDepartment, FireDistance FireNumber, FireTime) 
VALUES ('$fireDepartment', '$fireDistance', '$phoneNumber', '$fireTime')";

$sql = "INSERT INTO hospital (Hospital, Distance, HospitalNumber, HospitalResponseTime) 
VALUES ('$hospital', '$Distance', '$phoneNumber', '$hospitalResponseTime')";

if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}


   // Close the database connection when done
mysqli_close($conn);
?>
