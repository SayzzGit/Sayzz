<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get input values
    $website_name = $_POST['WebSite_Name'];
    $db_host = $_POST['DB_HOST'];
    $db_user = $_POST['DB_USER'];
    $db_pass = $_POST['DB_PASS'];
    $db_name = $_POST['DB_NAME'];

    // Check database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create tables
    $sql = file_get_contents('db/CreateTable.sql');
    if ($conn->multi_query($sql) === TRUE) {
        echo "Tables created successfully";
    } else {
        echo "Error creating tables: " . $conn->error;
    }

    // Update ConfigWeb.php
    $config_content = "<?php\n";
    $config_content .= "define('WEB_SITE_NAME', '$website_name');\n";
    $config_content .= "define('DB_HOST', '$db_host');\n";
    $config_content .= "define('DB_USER', '$db_user');\n";
    $config_content .= "define('DB_PASS', '$db_pass');\n";
    $config_content .= "define('DB_NAME', '$db_name');\n";

    file_put_contents('ConfigWeb.php', $config_content);

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Install</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="WebSite_Name">Website Name</label>
            <input type="text" class="form-control" id="WebSite_Name" name="WebSite_Name" required>
        </div>
        <div class="form-group">
            <label for="DB_HOST">Database Host</label>
            <input type="text" class="form-control" id="DB_HOST" name="DB_HOST" required>
        </div>
        <div class="form-group">
            <label for="DB_USER">Database User</label>
            <input type="text" class="form-control" id="DB_USER" name="DB_USER" required>
        </div>
        <div class="form-group">
            <label for="DB_PASS">Database Password</label>
            <input type="password" class="form-control" id="DB_PASS" name="DB_PASS" required>
        </div>
        <div class="form-group">
            <label for="DB_NAME">Database Name</label>
            <input type="text" class="form-control" id="DB_NAME" name="DB_NAME" required>
        </div>
        <button type="submit" class="btn btn-primary">Install</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
