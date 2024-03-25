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
    $fireStation = $_POST['fireStation'];
    $fireDistance = $_POST['fireDistance'];
    $fireNumber = $_POST['fireNumber'];
    $fireTime = $_POST['fireTime'];

    //Retrieve form data for hospital
    $hospitalLocation = $_POST['hospitalLocation'];
    $Distance = $_POST['distance'];
    $phoneNumber = $_POST['phoneNumber'];
    $hospitalResponseTime = $_POST['hospitalTime'];

   
    // SQL query to insert data into policeforce table
    $sql_Police = "INSERT INTO policeforce (PoliceStation, PoliceDistance, PhoneNumber, PoliceTime) VALUES ('$policeStation', '$policeDistance', '$phoneNumber', '$policeTime')";

    if ($conn->query($sql_Police) === TRUE) {
        echo "New police record created successfully";
    }

    // SQL query to insert data into firedepartment table
    $sql_Fire = "INSERT INTO firedepartment (FireStation, FireDistance, PhoneNumber, FireTime) VALUES ('$fireStation', '$fireDistance', '$phoneNumber', '$fireTime')";

    if ($conn->query($sql_Fire) === TRUE) {
        echo "New fire record created successfully";
    } 
    if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
    }

    $sql = "INSERT INTO hospital (HospitalLocation, Distance, PhoneNumber, HospitalResponseTime) 
        VALUES ('$hospitalLocation', '$Distance', '$phoneNumber', '$hospitalResponseTime')";
     if ($conn->query($sql_Fire) === TRUE) {
        echo "New fire record created successfully";
    } 
    if ($conn->query($sql) === TRUE) {
    header("Location: https://usarcent.azurewebsites.net/Form.html");
    exit();
    }


   // Close the database connection when done
mysqli_close($conn);
?>
