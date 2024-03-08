//The code below connects the login page to the database to validate the credentials in order to log in
<?php
try {
    $conn = mysqli_init();
    mysqli_real_connect($conn, "usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// Get user input from the form
    $Username = validate($_POST['Username']);
    $Password = validate($_POST['Password']);

    if (empty($Username)) {
        header("Location: index.php?error=Username is required");
        exit();
    }else if(empty($Password)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{$sql = "SELECT * FROM users WHERE Username='$Username' AND UserPassword='$Password'";
          $result = mysqli_query($conn, $sql);
          if (mysql_num_rows($result)) {
              echo "hello";
          }
    }
}else{
    header("Location: index.php");
    exit();

// Close the database connection
$conn->close();
?>
