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

// Retrieve form data for fire
$fireDepartment = $_POST['fireDepartment'];
$fireDistance = $_POST['fireDistance'];
$fireNumber = $_POST['fireNumber'];
$fireTime = $_POST['fireTime'];

//Retrieve form data for hospital
$hospitalLocation = $_POST['hospitalLocation'];
$distance = $_POST['distance'];
$hospitalNumber = $_POST['hospitalNumber'];
$hospitalResponseTime = $_POST['hospitalResponseTime'];

$sqlPolice = "INSERT INTO policeforce (PoliceForce, PoliceDistance, PoliceNumber, PoliceTime) 
VALUES ('$policeForce', '$policeDistance', '$policeNumber', '$policeTime')";

$sqlFire = "INSERT INTO firedepartment (FireDepartment, FireDistance, FireNumber, FireTime) 
VALUES ('$fireDepartment', '$fireDistance', '$fireNumber', '$fireTime')";

$sqlHospital = "INSERT INTO hospital (HospitalLocation, Distance, HospitalNumber, HospitalResponseTime) 
VALUES ('$hospitalLocation', '$distance', '$hospitalNumber', '$hospitalResponseTime')";

// Execute SQL queries
if ($conn->query($sqlPolice) === TRUE && $conn->query($sqlFire) === TRUE && $conn->query($sqlHospital) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
} else {
    echo "Error: " . $conn->error;
}


// Close the database connection when done
mysqli_close($conn);
?>
