<?php
include './database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['id'];
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newRole = $_POST['new_role'];

    $db = new Database();

    $updateData = [
        'username' => $newUsername,
        'email' => $newEmail,
        'role' => $newRole
    ];

    $condition = 'id = ?';
    $conditionParams = [$user_id];

    $db->update('users', $updateData, $condition, $conditionParams);
    
    echo "User information updated successfully.";
}


header("location: ../Week-7/index.php");