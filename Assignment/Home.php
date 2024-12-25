<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p id="welcome">Hii <span id="wlcm">
        <?php
    session_start();
    $name= $_SESSION["name"]; 
    echo $name;
    ?>
    </span>
<br>

Welcome to Home Page</p>
    <p id="redirect">
    <a href="logout.php">Logout</a>
    </p>
   
</body>
</html>