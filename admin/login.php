<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Shoes Ordering System</title>
        <link rel="stylesheet" href="../css/style2.css">
    </head>

    <body>
        <div id="main" style="width: 450px; height: 330px;">
			<img src="../images/lootshoe.png" height="400" />
		</div>
        <div class="login">
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSIION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

        <!-- LOGIN FORM START -->
	    <div class="container">
		<div class="title">Administrator Login</div>
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
        	</div>
			   <!-- Login Form Ends HEre -->
		</form>
   	</div>
		</div>
    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>