<?php
//include auth_session.php file on all user panel pages
include("start-session.php");
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>Welcome to LootShoe.</p>
        <p><a href="index.php">Logout</a></p>
    </div>
</body>
</html>