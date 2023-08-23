<?php
if (isset($_GET["success"]) && $_GET["success"] === "registered") {
    echo '<script>';
    echo 'alert("Registered successfully! You can now log in.");';
    echo '</script>';
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <link rel="stylesheet" href="./style.css">
    <title>Log in</title>
</head>
<body>
<div class="container">
        <div class="form-wrapper">
            <h2>Log in</h2>
            <form id="loginform" action="./includes/login.inc.php" method="POST">
                <label for="login-username">Username</label>
                <input type="text" id="lusername" name="loginusername">

                <label for="login-password">Password</label>
                <input type="password" id="lpassword" name="loginpassword">

            
                <button type="submit" name="signup">LOG IN</button>
            </form>
        </div>
    </div>




    <script>
            $(document).ready(function() {
                $("#loginform").submit(function(event){
                    
                    
                    var username = $("#lusername").val();
                    var password = $("#lpassword").val();

                    if(username === "" || password === ""){
                        event.preventDefault();
                        alert("Username and password are required fields.");
                        return;
                    }
            
                });
            });
    </script>
</body>
</html>