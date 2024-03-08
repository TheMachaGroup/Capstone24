//this code has not been tested as of 3/7 

<form action="register.php" method="post">
  <label for="username">Username:</label> 
  <input id="username" name="username" required="" type="text" />
  <label for="email">Email:</label>
  <input id="email" name="email" required="" type="email" />
  <label for="password">Password:</label>
  <input id="password" name="password" required="" type="password" />
  <input name="register" type="submit" value="Register" />
</form>

?php if (isset($_POST['register'])) {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
catch (PDOException $e) {
    print("Error connecting to MySQL Server.");
    die(print_r($e));
}
// Prepare and bind the SQL statement 
$stmt = $mysqli->prepare("INSERT INTO Users (FirstName, LastName, Username, UserPassword) VALUES (?, ?, ?, ?)"); $stmt->bind_param("sss", $firstname, $lastname, $username, $userpassword); 

// Get the form data 
$firstname = $_POST['FirstName']; $lastname = $_POST['LastName']; $username = $_POST['Username']; $password = $_POST['UserPassword']; 

// Hash the password 
$password = password_hash($password, PASSWORD_DEFAULT); 

// Execute the SQL statement 
if ($stmt->execute()) { echo "New account created successfully!"; } else { echo "Error: " . $stmt->error; } 

// Close the connection 
$stmt->close(); $mysqli->close(); }
