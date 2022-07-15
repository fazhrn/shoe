<?php 

    include('../config/constants.php'); 
    include('login-check.php');

?>


<html>
    <head>
        <title>LootShoe - Home Page</title>

        <link rel="stylesheet" href="../css/admin.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
                <section class="navbar">
            <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-shoes.php">Shoes</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        </section>
    </body>
</html>
                        
        <!-- Menu Section Ends -->