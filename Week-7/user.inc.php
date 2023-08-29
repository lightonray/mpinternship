<?php


include './database.php';
include './user.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the form fields are named 'username', 'email', and 'role'
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Create a new Database instance
    $db = new Database();

    // Create a new User instance with the provided data
    $user = new User(1, $username, $email, $role);

    // Insert user data into the 'users' table
    $db->create('users', [
        'username' => $user->getUsername(),
        'email' => $user->getEmail(),
        'role' => $user->getRole()
    ]);
}


header("location: ../Week-7/index.php");