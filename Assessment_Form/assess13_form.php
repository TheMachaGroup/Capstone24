<?php
// Establish a connection to the MySQL database
$conn = mysqli_connect("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data for police
$policeForce = $_POST['policeForce'];
$policeDistance = $_POST['policeDistance'];
$policeNumber = $_POST['policeNumber'];
$policeTime = $_POST['policeTime'];

$policeSql = "INSERT INTO policeforce (PoliceForce, PoliceDistance, PoliceNumber, PoliceTime) 
VALUES ('$policeForce', '$policeDistance', '$policeNumber', '$policeTime')";

// Retrieve form data for fire
$fireDepartment = $_POST['fireDepartment'];
$fireDistance = $_POST['fireDistance'];
$fireNumber = $_POST['fireNumber'];
$fireTime = $_POST['fireTime'];

$fireSql = "INSERT INTO firedepartment (FireDepartment, FireDistance, FireNumber, FireTime) 
VALUES ('$fireDepartment', '$fireDistance', '$fireNumber', '$fireTime')";

//Retrieve form data for hospital
$hospital = $_POST['hospital'];
$distance = $_POST['distance'];
$phoneNumber = $_POST['phoneNumber'];
$hospitalResponseTime = $_POST['hospitalResponseTime'];

$hospitalSql = "INSERT INTO hospital (Hospital, Distance, HospitalNumber, HospitalResponseTime) 
VALUES ('$hospital', '$distance', '$phoneNumber', '$hospitalResponseTime')";

if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
}


   // Close the database connection when done
mysqli_close($conn);
?>
