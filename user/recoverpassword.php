<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Simulate checking if the email is registered
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Connect to the database
        $conn = new mysqli('localhost', 'username', 'password', 'database');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get the password from the Table_User
        $sql = "SELECT password FROM Table_User WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($password);
        $stmt->fetch();
        $stmt->close();
        $conn->close();

        if ($password) {
            // Simulate sending a password recovery email
            // In a real application, you would use a mail function here
            echo json_encode(['message' => 'Your password is: ' . $password]);
        } else {
            echo json_encode(['message' => 'If this email is registered, you will receive a password recovery link.']);
        }
    } else {
        echo json_encode(['message' => 'Please enter a valid email address.']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}
?>
