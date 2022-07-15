<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LootShoe Website</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- NAVIGATION BAR START -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a title="Logo">
                    <img src="lootshoe.png" alt="Shop Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>shoes.php">Shoes</a>
                    </li>
                    <li>
                        <a href=<?php echo SITEURL; ?>plogout.php>Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
        
    </section>
    <!-- NAVIGATION BAR END -->