<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare the SQL query
    $sql = "SELECT * FROM admin_table WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful login
        $_SESSION['admin_username'] = $username;
        header("Location: ../HTML/admin_page.php"); // Redirect to admin dashboard
        exit();
    } else {
        // Invalid credentials
        header("Location: ../HTML/admin_login.php?error=Invalid Username or Password");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
