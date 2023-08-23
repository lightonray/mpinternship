<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="form-wrapper">
            <h2>Sign Up</h2>
            <form id="regestrationform" action="./includes/register.inc.php" method="POST">
                <label for="signup-username">Username</label>
                <input type="text" id="username" name="signupusername">

                <label for="signup-password">Password</label>
                <input type="password" id="password" name="signuppassword">

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="cpassword" name="confirmpassword">

                <label for="signup-email">Email</label>
                <input type="text" id="email" name="signupemail">

                <label for="signup-email">Phone</label>
                <input type="text" id="phone" name="phone">
                

                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>
    </div>




    <script>
            $(document).ready(function() {
                $("#regestrationform").submit(function(event){
                    
                    
                    var username = $("#username").val();
                    var password = $("#password").val();
                    var cpassword = $("#cpassword").val();
                    var email = $("#email").val();
                    var phone = $("#phone").val();

                    if(username === "" || email === "" || password === "" || phone === ""){
                        event.preventDefault();
                        alert("Username, email, and password are required fields.");
                        return;
                    }

                    if(password !== cpassword){
                        event.preventDefault();
                        alert("Password does not match!");
                        return;
                    }     
                    
                    // Email validation using regular expression
                    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                    if (!emailPattern.test(email)) {
                        event.preventDefault();
                        alert("Invalid email address.");
                        return;
                    }

                    // Phone number validation using regular expression
                    var phonePattern = /^\d+$/;
                    if (!phonePattern.test(phone)) {
                        event.preventDefault(); // Prevent the default form submission
                        alert("Phone number should contain only numbers.");
                        return;
                    }

                });
            });
    </script>
</body>
</html>