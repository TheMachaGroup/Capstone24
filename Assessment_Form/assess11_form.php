<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $host = "usarcent-server.mysql.database.azure.com";
    $username = "thpgbqeide";
    $password = "0LB5E265UCUE1D5E$";
    $database = "usarcent-database";
    $port = 3306;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;port=$port", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected to database<br>";

        // Retrieve form data
        $subGuards = $_GET['subGuards'];
        $military = $_GET['Military'];
        $BNComments = $_GET['BNComments'];

        // Prepare and execute SQL statement to insert data into the database
        $stmt = $pdo->prepare("INSERT INTO SecurityManning (SubcontractedGuards, MilitarySecurityGuards, Comments) VALUES (:subGuards, :military, :BNComments)");
        $stmt->bindParam(':subGuards', $subGuards);
        $stmt->bindParam(':military', $military);
        $stmt->bindParam(':BNComments', $BNComments);

        if ($stmt->execute()) {
            // Retrieve the ID of the last inserted record
            $lastInsertedId = $pdo->lastInsertId();
            echo "Record inserted successfully. Last inserted ID: " . $lastInsertedId;
        } else {
            echo "Error inserting record into SecurityManning table";
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    $pdo = null; // Close connection
}
ob_end_flush();
?>
