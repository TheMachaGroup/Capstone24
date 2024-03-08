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
			<li><img src="img/icons/home.svg" class="icon"><a href="form.html">New Assessment</a></li>
			<li><img src="img/icons/folder.svg" class="icon"><a href="manage_report/manage_report.html">Report Manager</a></li>
			<li><img src="img/icons/setting.svg" class="icon"><a href="settings/settings.html">Settings</a></li>
			<li><img src="img/icons/createaccount.svg" class="icon"><a href="login_page/registerform.php">Create Account</a></li>
			<li><img src="img/icons/help.svg" class="icon"><a href="help_page/help.html">Help</a></li>
			<li><img src="img/icons/log-out.svg" class="icon"><a href="index.html">Log Out</a></li>
		</ul>
	</nav>
	
	<div id="title-container">
		<h1 class="title">New Assessment</h1>
		<button id="add" class="pulse">+</li></button>
	</div>
	<div id="add-option"> <!--This is the code for the the add nef form button goint to the Assessment Form Page-->
		<ul>
			<li>
				<a href="Form.html" target="_self" style="text-decoration: none; color: black;">Begin New Assessment</a>
			</li>
		</ul>
	</div>

	
	<script src="nav.js" type="text/javascript"></script>
	<script src="index.js" type="text/javascript"></script>
</body>
</html>
