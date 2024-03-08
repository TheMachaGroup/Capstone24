//This page is currently not working as of 3/8
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli("usarcent-server.mysql.database.azure.com", "thpgbqeide", "0LB5E265UCUE1D5E$", "usarcent-database", 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected to database<br>";

	// Retrieve the user's role from the database based on their login credential
// Replace the following lines with your actual database query and authentication logic
$Username = $_POST['Username'];
$Password = $_POST['UserPassword'];

// Example query to retrieve the user role based on the username and password
$query = "SELECT Role FROM users WHERE Username = ? AND UserPassword = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('ss', $Username, $Password);
$stmt->execute();
$stmt->bind_result($userRole);

// Check if the user exists and get their role
if ($stmt->fetch()) {
    // Start output buffering to capture HTML content
    ob_start();
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../webapp/home.css">
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="main.css" >
	<link rel="stylesheet" href="form.css" />
	
	<title>HAA - Home Page</title>

</head>

<style>
	html {
		overflow-y: scroll;
	}
</style>

<body>
	<nav id="nav-bar">
		<ul id="nav-bar-list">
			<li id="id-container"><img src="img/logo.png" id="logo"><span id="logo_text">Housing Assessment</span><img src="img/icons/three-line.svg" id="collapse" class="collapse-style"></li><br>
			<li id="user"><img src="img/icons/person.svg" class="icon"><span id="user-name">User Name</span></li>
			<li><img src="img/icons/home.svg" class="icon"><a href="form.php">New Assessment</a></li>
			<li><img src="img/icons/folder.svg" class="icon"><a href="manage_report/manage_report.html">Report Manager</a></li>
			<li><img src="img/icons/setting.svg" class="icon"><a href="settings/settings.html">Settings</a></li>
			<li><img src="img/icons/createaccount.svg" class="icon"><a href="login_page/registerform.php">Create Account</a></li>
			<li><img src="img/icons/help.svg" class="icon"><a href="help_page/help.html">Help</a></li>
			<li><img src="img/icons/log-out.svg" class="icon"><a href="index.html">Log Out</a></li>
		</ul>
	</nav>
	
	<div id="title-container">
		<h1 class="title">New Assessment</h1>
	<?php

    // Use a switch statement or if conditions to generate content based on the user role
    switch ($Role) {
        case 'ADMIN':
            echo '<p>Welcome, Admin! You have access to all features.</p>';
            echo '<button type="button">Create Report</button> 
	    echo '<button type="button">Create Report</button>
<button id="add" class="pulse">+</button>
<li><a href="Form.html" target="_self" style="text-decoration: none; color= black;">Begin New Assessment</a></li>';
            break;
        case 'ANALYST':
            echo '<p>Welcome, Analyst! You have limited access and are unable to complete assessments.</p>';
            // Hide the "Create Report" button for Analysts
            break;
    }

    // Get the generated HTML content and turn off output buffering
    $pageContent = ob_get_clean();

    // Output the final HTML content
    echo $pageContent;
} else {
    // User authentication failed, handle accordingly (e.g., redirect to login page)
    echo "Authentication failed. Please check your credentials.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
