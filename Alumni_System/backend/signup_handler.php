<?php
include('../config/app.php');

if (isset($_POST['register_btn'])) {
    // Get form inputs
    $access = $_POST['access'];
    $uname = $_POST['uname'];
    $user_id = !empty($_POST['user_id']) ? $_POST['user_id'] : null;
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['message'] = "Passwords do not match!";
        header("Location: ../users/signup.php");
        exit;
    }

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // If access is Registrar, set uname to 'Registrar' and ucode to '000'
    if ($access === 'Registrar') {
        $uname = 'Registrar';
        $ucode = '000';
    }

    // Assign ucode based on uname
    $ucode_list = ['Registrar' => '000', 'Dean' => '001', 'ACT' => '002', 'IT' => '003', 'CS' => '004'];
    $ucode = $ucode_list[$uname] ?? '000';

    // Ensure Registrar requires a user_id
    if ($access === 'Registrar' && empty($user_id)) {
        $_SESSION['message'] = "Registrar must have a User ID!";
        header("Location: ../users/signup.php");
        exit;
    }

    // Insert user into database
    $stmt = $db->conn->prepare("INSERT INTO users_table (user_id, password, access, uname, ucode) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $hashed_password, $access, $uname, $ucode);

    if ($stmt->execute()) {
        $_SESSION['message'] = "User Registered Successfully!";
        header("Location: ../users/login.php");
        exit;
    } else {
        $_SESSION['message'] = "User Registration Failed!";
        header("Location: ../users/signup.php");
        exit;
    }
}
?>
