?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

    // Get the form data
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Username = $_POST['Username'];
    $Password = $_POST['UserPassword'];
    $Role = $_POST['Role'];
    echo "Received form data<br>";

    // Prepare and bind the SQL statement to check if the username already exists
    $stmt = $conn->prepare('SELECT UserID, UserPassword FROM users WHERE username = ?');
    $stmt->bind_param('s', $Username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the account already exists in the database
    if ($stmt->num_rows > 0) {
        echo 'Account already exists, please create another!';
    } else {
        // Prepare and bind the SQL statement to insert a new account
        $stmt = $conn->prepare('INSERT INTO users (FirstName, LastName, Username, UserPassword, Role) VALUES (?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $FirstName, $LastName, $Username, $Password, $Role);
        echo "Entered into database<br>";

        if ($stmt->execute()) {
            header("Location: https://usarcent.azurewebsites.net/form.html");
            exit();
        } else {
            echo 'Error creating account: ' . $stmt->error;
        }
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
