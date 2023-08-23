<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = htmlspecialchars($_POST["signupusername"]);
    $password = htmlspecialchars($_POST["signuppassword"]);
    $cpassword = htmlspecialchars($_POST["confirmpassword"]);
    $email = htmlspecialchars($_POST["signupemail"]);
    $phone = htmlspecialchars($_POST["phone"]);
}


include '../classes/dbh.php';
include '../classes/register.classes.php';
include '../classes/register.contr.php';


$signup = new RegisterContr($username,$password,$cpassword,$email,$phone);
$signup->SignUp();


