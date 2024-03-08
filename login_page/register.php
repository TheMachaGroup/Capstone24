<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form data
    $First Name = $_POST['FirstName'];
    $Last Name = $_POST['LastName'];
    $Username = $_POST['Username'];
    $Password = $_POST['UserPassword'];
    $Role = $_POST['Role'];


        // Check if the account already exists in the database
        if ($stmt->num_rows < 0) {
            Header("Location: https://usarcent.azurewebsites.net/form.html");
            exit();
        } else {
            echo 'Account already exists, please create another!';
            }
   

    // Close the connection
    $conn->close();
}
?>
