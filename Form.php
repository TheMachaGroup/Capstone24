//The code below is the connection to the database we created in Phase 2
//Depending on how ownership is transferred, This may need to be updated

<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
        try {
            // Define your database connection parameters
            $serverName = "tcp:f23arcenthousing.database.windows.net,1433";
            $connectionOptions = array(
                "Database" => "USARCENT Housing",
                "Uid" => "CloudSAc0020864",
                "PWD" => "Usarcent564!",
                "Encrypt" => 1,
                "TrustServerCertificate" => 0,
            );
    
            // Establish a database connection
            $conn = sqlsrv_connect($serverName, $connectionOptions);
    
            if (!$conn) {
                die(print_r(sqlsrv_errors(), true));
            }
    
            // Retrieve form data
            $totalRooms = $_POST["totalApartmentsInComplex"];
            $totalPeople = $_POST["totalPersonnelInComplex"];
        
            
            // Add more fields as needed
    
            // Define your SQL query to insert data into a table (modify the table and column names accordingly)
            $sql = "INSERT INTO Occupancy_Information (TotalApartmentsInComplex, TotalPersonnelInComplex) VALUES (totalRooms, totalPeople)";
            $params = array($totalApartmentsInComplex, $totalPersonnelInComplex);
            $stmt = sqlsrv_query($conn, $sql, $params);
    
            if ($stmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
    
            // Close the database connection
            sqlsrv_close($conn);
    
            // Redirect to a confirmation page
            header("Location: confirmation.html");
            exit();
            
        } catch (Exception $e) {
            // Handle any exceptions or errors here
            echo "An error occurred: " . $e->getMessage();
        	}
   	}
?>
