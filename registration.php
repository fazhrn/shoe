<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style2.css"/>
</head>
<body>
<?php
    require('config/constants.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
		$full_name = $_POST['full_name'];
        $username =  $_POST['username'];
        $email    = $_POST['email'];
		$contact    = $_POST['contact'];
        $password = $_POST['password'];
        $qry    = "INSERT into `tbl_customer` (full_name, username, password, email, contact)
                     VALUES ('$full_name', '$username', '" . md5($password) . "', '$email', '$contact')";
        $res      = mysqli_query($conn, $qry);
        if ($res) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='plogin.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>  
    <div id="main" style="width: 450px; height: 330px;">
			<img src="images/lootshoe.png" height="400" />
		</div>
	<div class="container">
		<div class="title">Registration</div>
     	<form id="register" name="register" method="post">
       	<div class="user-details">
         	<div class="input-box">
           	<span class="details">Full Name</span>
				<input type="text" name="full_name" id="full_name" placeholder="Enter your name" required>
			</div>
			<div class="input-box">
				<span class="details">Username</span>
				<input type="text" name="username" id="username" placeholder="Enter your username" required>
         	</div>
			<div class="input-box">
				<span class="details">Email Address</span>
				<input type="text" name="email" id="email"  placeholder="Enter your email address" required>
			</div>
			<div class="input-box">
				<span class="details">Phone No</span>
				<input type="text" name="contact" id="contact"  placeholder="Enter your phone number" required>
			</div>
			<div class="input-box">
				<span class="details">Password</span>
				<input type="password" name="password" id="password" placeholder="Enter your password" required>
			</div>
     	</div>
			<div class="button">
				<input type="submit" name="submit"  value="Register" class="login-button">
                <p class="link"><a href="plogin.php">Click to Login</a></p>
        	</div>
		</form>
   	</div>
<?php
    }
?>
</body>
</html>