<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $loginusername = htmlspecialchars($_POST['loginusername']);
    $loginpassword = htmlspecialchars($_POST['loginpassword']);
}


// Instaniate SignupContr class
include '../classes/dbh.php';
include '../classes/login.classes.php';
include '../classes/login.contr.php';
$login = new LoginContr($loginusername,$loginpassword);

// Runnning error handlers and user signup
$login->logIn();

// Going back to front page

header("location: ../profile.php?error=none");