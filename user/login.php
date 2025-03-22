<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include __DIR__ . '/../includes/Head.php'; ?>
</head>
<body>
    <?php include __DIR__ . '/../includes/Header.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Include database configuration
            include __DIR__ . '/../includes/ConfigWeb.php';

            // Database connection
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind
            $stmt = $conn->prepare("SELECT * FROM Table_User WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<div class="alert alert-success" role="alert">Login successful!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Invalid username or password.</div>';
            }

            $stmt->close();
            $conn->close();
        }
        ?>
        <form action="" method="post" class="mt-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    <?php include __DIR__ . '/../includes/Foot.php'; ?>
</body>
</html>
