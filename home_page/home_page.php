<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="account.css">
    <title>Document</title>
</head>
<body>
	<?php

    // Use a switch statement or if conditions to generate content based on the user role
    switch ($Role) {
        case 'ADMIN':
            echo '<p>Welcome, Admin! You have access to all features.</p>';
            echo '<nav id="nav-bar">
		<ul id="nav-bar-list">
			<li id="id-container"><img src="../img/logo.png" id="logo"><span id="logo_text">HOME</span><img src="../img/icons/three-line.svg" id="collapse" class="collapse-style"></li><br>
			<li><img src="img/icons/home.svg" class="icon"><a href="home_page/home_page.html">HOME</a></li>
			<li id="user"><img src="../img/icons/person.svg" class="icon"><span id="user-name">User Name</span></li>
			<li><img src="img/icons/home.svg" class="icon"><a href="form.html">New Assessment</a></li>
			<li><img src="img/icons/folder.svg" class="icon"><a href="manage_report/manage_report.html">Report Manager</a></li>
			<li><img src="img/icons/setting.svg" class="icon"><a href="settings/settings.html">Settings</a></li>
			<li><img src="img/icons/createaccount.svg" class="icon"><a href="login_page/registerform.php">Create Account</a></li>
			<li><img src="img/icons/help.svg" class="icon"><a href="help_page/help.html">Help</a></li>
			<li><img src="img/icons/log-out.svg" class="icon"><a href="index.html">Log Out</a></li>
		</ul>
	</nav>';
            break;
        case 'ANALYST':
            echo '<p>Welcome, Analyst! You have limited access.</p>';
            // Hide the "Create Report" button for Analysts
	    echo '<nav id="nav-bar">
		<ul id="nav-bar-list">
			<li id="id-container"><img src="../img/logo.png" id="logo"><span id="logo_text">HOME</span><img src="../img/icons/three-line.svg" id="collapse" class="collapse-style"></li><br>
			<li><img src="img/icons/home.svg" class="icon"><a href="home_page/home_page.html">HOME</a></li>
			<li id="user"><img src="../img/icons/person.svg" class="icon"><span id="user-name">User Name</span></li>
			<li><img src="img/icons/home.svg" class="icon"><a href="form.html">New Assessment</a></li>
			<li><img src="img/icons/folder.svg" class="icon"><a href="manage_report/manage_report.html">Report Manager</a></li>
			<li><img src="img/icons/setting.svg" class="icon"><a href="settings/settings.html">Settings</a></li>
			<li><img src="img/icons/createaccount.svg" class="icon"><a href="login_page/registerform.php">Create Account</a></li>
			<li><img src="img/icons/help.svg" class="icon"><a href="help_page/help.html">Help</a></li>
			<li><img src="img/icons/log-out.svg" class="icon"><a href="index.html">Log Out</a></li>
		</ul>
	</nav>';
            break;
        // Add more cases for other roles if needed
        default:
            echo '<p>Welcome! You have a default role.</p>';
            break;
    }

    // Your HTML content after the dynamic section
    ?>

          
</body>
</html>
