
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
$stmt = $mysqli->prepare("INSERT INTO users (FirstName, LastName, Username, UserPassword) VALUES (?, ?, ?, ?)"); $stmt->bind_param("sss", $firstname, $lastname, $username, $userpassword); 

// Get the form data 
$firstname = $_POST['FirstName']; $lastname = $_POST['LastName']; $username = $_POST['Username']; $password = $_POST['UserPassword']; 

// Execute the SQL statement 
if ($stmt->execute()) { echo "New account created successfully!"; } else { echo "Error: " . $stmt->error; } 

// Close the connection 
$stmt->close(); $mysqli->close(); }
