<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:f23arcenthousing.database.windows.net,1433;
        Database = USARCENT Housing", "CloudSAc0020864", "Usarcent564!");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "CloudSAc0020864", "pwd" => "Usarcent564!",
    "Database" => "USARCENT Housing", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:f23arcenthousing.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>