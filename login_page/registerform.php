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
    <nav id="nav-bar">
		<ul id="nav-bar-list">
			<li id="id-container"><img src="../img/logo.png" id="logo"><span id="logo_text">Create Account</span><img src="../img/icons/three-line.svg" id="collapse" class="collapse-style"></li><br>
			<li id="user"><img src="../img/icons/person.svg" class="icon"><span id="user-name">User Name</span></li>
			<li><img src="img/icons/home.svg" class="icon"><a href="form.html">New Assessment</a></li>
			<li><img src="img/icons/folder.svg" class="icon"><a href="manage_report/manage_report.html">Report Manager</a></li>
			<li><img src="img/icons/setting.svg" class="icon"><a href="settings/settings.html">Settings</a></li>
			<li><img src="img/icons/createaccount.svg" class="icon"><a href="login_page/registerform.php">Create Account</a></li>
			<li><img src="img/icons/help.svg" class="icon"><a href="help_page/help.html">Help</a></li>
			<li><img src="img/icons/log-out.svg" class="icon"><a href="index.html">Log Out</a></li>
		</ul>
	</nav>
    <form action="register.php" method="POST">
        <div id="container1">
            <div id="container2">
                <h1 id="title">Create account</h1>
                    <label class="box_label">First Name</label>
                    <input class="input_box" required>
                    <label class="box_label">Last Name</label>
                    <input class="input_box" required>
                    <label class="box_label">Username</label>
                    <input class="input_box" required>
                    <label class="box_label">Password</label>
                    <input class="input_box" required>
		    <label class="box_label">Role</label>
                    <input class="input_box" placeholder="ADMIN or ANALYST" required>
                </div>

                <button type="submit" id="register" class="btn">Create Account</button>
            </div>
            
        </div>
    </form>
</body>
</html>
