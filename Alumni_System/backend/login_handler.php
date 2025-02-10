<?php
ob_start();
session_start();
include('../config/app.php');  // Load database connection

$conn = $db->getConnection(); // Get MySQL connection

if (isset($_POST['login_btn'])) {
    $access = $_POST['access'];
    $ucode = $_POST['ucode'];
    $password = $_POST['password'];

    if (empty($access) || empty($ucode) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header('Location: ../login.php');
        exit();
    }

    // Fetch user from database
    $query = "SELECT * FROM users WHERE access = ? AND ucode = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $access, $ucode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if ($password === $row['password']) {
            $_SESSION['auth'] = true;
            $_SESSION['user'] = $row;

            // Redirect based on access and ucode
            if ($access == 'CITCS') {
                switch ($ucode) {
                    case '001': header('Location: ../dean_page.php'); break;
                    case '002': header('Location: ../act_page.php'); break;
                    case '003': header('Location: ../bsit_page.php'); break;
                    case '004': header('Location: ../bscs_page.php'); break;
                    default:
                        $_SESSION['error'] = "Invalid ucode.";
                        header('Location: ../users/login.php');
                }
            } else {
                header('Location: ../dashboard.php');
            }
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password.";
            header('Location: ../users/login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid credentials.";
        header('Location: ../users/login.php');
        exit();
    }
}
ob_end_flush();
?>
