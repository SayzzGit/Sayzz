<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include __DIR__ . '/../includes/Head.php'; ?>
</head>
<body>
    <h1 class="text-center">Login</h1>
    <form action="login_process.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    <?php include __DIR__ . '/../includes/Foot.php'; ?>
</body>
</html>
