<?php
include './database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['id'];

    $db = new Database();
    $condition = 'id = ?';
    $conditionParams = [$user_id];

    $deleteResult = $db->delete('users', $condition,$conditionParams);

    if ($deleteResult) {
        echo "User deleted successfully.";
    } else {
        echo "Failed to delete user.";
    }
}


header("location: ../Week-7/index.php");


