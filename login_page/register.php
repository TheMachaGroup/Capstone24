//this code has not been tested as of 3/7 

<form id="account" action="#" method="POST">
        <div id="container1">
            <div id="container2">
                <h1 id="title">Create account</h1>
                <div class="prog-bar"></div>
                <div id="step-1" class="steps">
                    <label class="box_label">First Name</label>
                    <input class="input_box" required>
                    <label class="box_label">Last Name</label>
                    <input class="input_box" required>
                    <label class="box_label">Username</label>
                    <input class="input_box" required>
                    <label class="box_label">Password</label>
                    <input class="input_box" required>
                </div>
                <button class="btn" id="cnt" type="button">Continue</button>
            </div>
            
        </div>
    </form>
    <script type="text/javascript" src="step.js"></script>
</body>
</html>

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
