<?php
include './database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $user_id = $_GET['id'];

                    $db = new Database();
                    $condition = 'id = ?';
                    $conditionParams = [$user_id];
                    $user = $db->read('users', $condition, $conditionParams);

                    if (!empty($user)) {
                        $userData = $user[0]; // First user found (assuming ID is unique)
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center">User Information</h2>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li><strong>ID:</strong> <?php echo $userData['id']; ?></li>
                                    <li><strong>Username:</strong> <?php echo $userData['username']; ?></li>
                                    <li><strong>Email:</strong> <?php echo $userData['email']; ?></li>
                                    <li><strong>Role:</strong> <?php echo $userData['role']; ?></li>
                                </ul>
                                <a href="./index.php" class="btn btn-primary" style="margin-left: 35%;">Back to Home</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        echo '<div class="alert alert-danger">User not found.</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>