<?php

session_start();

if (!isset($_SESSION["username"])) {
    // Redirect to an error page or login page
    header("location: ./login.php"); // Redirect to your login page
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Log in</title>
</head>
<body>
<div class="container">
        <div>
            <ul class="nav-list">
                <?php
                if (isset($_SESSION["username"])) {
                    echo '
                          <li class="nav-item">
                              <a class="login-button" href="./profile.php">Profile</a>
                          </li>
                          <li class="nav-item">
                              <a class="login-button" href="./includes/logout.inc.php">Log Out</a>
                          </li>';
                } else {
                    echo '<li class="nav-item">
                              <a class="login-button" href="./login.php">Log In</a>
                          </li>';
                }
                ?>
            </ul>
        </div>
    </div>
    
</body>
</html>