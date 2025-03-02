<?php
session_start();
include('../config/app.php');  // Load database connection

$conn = $db->getConnection(); // Get MySQL connection

if (isset($_POST['login_btn'])) {
    $alumni_id = $_POST['alumni_id'];
    $password = $_POST['password'];

    if (empty($alumni_id) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header('Location: ../users/login.php');
        exit();
    }

    // Fetch user from database using alumni_id
    $query = "SELECT * FROM users WHERE alumni_id = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $alumni_id, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = $row;
        $access = $row['access'];
        $ucode = $row['ucode'];

        // Check access level before proceeding to ucode
        if ($access === 'CITCS') {
            switch ($ucode) {
                case '001': header('Location: ../users/CITCS/Dean/dean_page.php'); break;
                case '002': header('Location: ../users/CITCS/ACT/act_page.php'); break;
                case '003': header('Location: ../users/CITCS/BSIT/bsit_page.php'); break;
                case '004': header('Location: ../users/CITCS/BSCS/bscs_page.php'); break;
                default:
                    $_SESSION['error'] = "Invalid ucode.";
                    header('Location: ../users/login.php');
                    exit();
            }
        } else {
            $_SESSION['error'] = "Access level not authorized.";
            header('Location: ../users/login.php');
            exit();
        }
        exit();
    } else {
        $_SESSION['error'] = "Invalid credentials.";
        header('Location: ../users/login.php');
        exit();
    }
}
ob_end_flush();
?>
