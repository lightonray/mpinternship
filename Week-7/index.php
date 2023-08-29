<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>User Management</h2>

        <!-- Add User Form -->
        <div class="mt-4">
            <h3>Add User</h3>
            <form method="post" action="./user.inc.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" name="role" id="role" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>

        <!-- Retrieve User Form -->
        <div class="mt-4">
            <h3>Retrieve User</h3>
            <form method="get" action="./getuser.inc.php">
                <div class="form-group">
                    <label for="id">User ID:</label>
                    <input type="text" class="form-control" name="id" id="id" required>
                </div>

                <button type="submit" class="btn btn-primary">Retrieve User</button>
            </form>
        </div>

        <!-- Update User Form -->
        <div class="mt-4">
            <h3>Update User</h3>
            <form method="post" action="./updateuser.inc.php">
                <div class="form-group">
                    <label for="id">User ID:</label>
                    <input type="text" class="form-control" name="id" id="id" required>
                </div>

                <div class="form-group">
                    <label for="new_username">New Username:</label>
                    <input type="text" class="form-control" name="new_username" id="new_username" required>
                </div>

                <div class="form-group">
                    <label for="new_email">New Email:</label>
                    <input type="email" class="form-control" name="new_email" id="new_email" required>
                </div>

                <div class="form-group">
                    <label for="new_role">New Role:</label>
                    <select class="form-control" name="new_role" id="new_role" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>

        <!-- Delete User Form -->
        <div class="mt-4">
            <h3>Delete User</h3>
            <form method="post" action="./deleteuser.inc.php">
                <div class="form-group">
                    <label for="id">User ID:</label>
                    <input type="text" class="form-control" name="id" id="id" required>
                </div>

                <button type="submit" class="btn btn-danger">Delete User</button>
            </form>
        </div>

        <!-- Placeholder for User Table -->
        <div class="mt-4">
            <?php
            include './user_table.inc.php';
            ?>
        </div>
    </div>

    <!-- Add Bootstrap JS scripts here -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>