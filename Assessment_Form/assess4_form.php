<?php
ob_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

   // Retrieve form data
    $nObstructions = $_GET['nObstructions'];
    $sObstructions = $_GET['sObstructions'];
    $eObstructions = $_GET['eObstructions'];
    $wObstructions = $_GET['wObstructions'];
    $BNComments = $_GET['BNComments'];
    
    // Prepare and execute SQL statement to insert data into the database
    $stmt = $pdo->prepare("INSERT INTO standoff_information (nObstructions, sObstructions, eObstructions, wObstructions, BNComments) VALUES (:nObstructions, :sObstructions, :eObstructions, :wObstructions, :BNComments)");
    $stmt->bindParam(':nObstructions', $nObstructions);
    $stmt->bindParam(':sObstructions', $sObstructions);
    $stmt->bindParam(':eObstructions', $eObstructions);
    $stmt->bindParam(':wObstructions', $wObstructions);
    $stmt->bindParam(':BNComments', $BNComments);
    
    // Check if the statement was executed successfully
    if ($stmt->execute()) {
        // Redirect to confirmation page
        header("Location: Assessment_Form/confirmation.html");
        exit();
    } else {
        // If execution fails, handle the error (e.g., display an error message)
        echo "Error: Unable to save data.";
    }
    // Close the connection
    $stmt->close();
    $conn->close();
}
ob_end_flush();
?>
