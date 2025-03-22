<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <?php include __DIR__ . '/../includes/Head.php'; ?>
</head>
<body>
    <h1 class="text-center">Create Account</h1>
    <form action="create_account_process.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <button type="submit">Create Account</button>
        </div>
    </form>
    <?php include __DIR__ . '/../includes/Foot.php'; ?>
</body>
</html>
