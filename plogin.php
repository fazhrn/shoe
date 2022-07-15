<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="css/style2.css"/>
</head>
<body>
<?php
    require('config/constants.php');
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Check user is exist in the database
        $qry    = "SELECT * FROM `tbl_customer` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $res  = mysqli_query($conn, $qry);
        $rows = mysqli_num_rows($res);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user home page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='plogin.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
	<div id="main" style="width: 450px; height: 330px;">
			<img src="images/lootshoe.png" height="400" />
		</div>
    <div class="container">
		<div class="title">Login</div>
     	<form id="register" name="login" method="post">
       	<div class="user-details">
			<div class="input-box">
				<span class="details">Username</span>
				<input type="text" name="username" id="username" placeholder="Enter your username" required>
         	</div>
			<div class="input-box">
				<span class="details">Password</span>
				<input type="password" name="password" id="password"  placeholder="Enter your password" required>
			</div>
     	</div>
			<div class="button">
				<input type="submit" value="Login" name="submit" class="login-button"/>
                <p class="link"><a href="registration.php">New Registration</a></p>
        	</div>
			<br>
			<div class="link">
                <p class="link"><a href="admin/login.php">Login as Admin</a></p>
        	</div>
		</form>
   	</div>
<?php
    }
?>
</body>
</html>