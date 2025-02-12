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
        // header('Location: ../login.php');
        exit();
    }

    // Fetch user from database
    $query = "SELECT * FROM users WHERE access = ? AND ucode = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $access, $ucode, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    

    if ($row = $result->fetch_assoc()) {

        echo "<script>console.log('User Found!<br>');</script>";
        echo "<script>console.log('Entered Password: [" . $password . "]<br>');</script>";
        echo "<script>console.log('Stored Password: [" . $row['password'] . "]<br>');</script>";
        var_dump($password);
        var_dump($row['password']);
    
        if (trim($password) === trim($row['password'])) {
            echo "<script>console.log('Passwords Match! Redirecting...');</script>";
        } else {
            echo "<script>console.log('Password Mismatch!);</script>";
        }

        if ($password === $row['password']) {
            $_SESSION['user'] = $row;

            // Redirect based on access and ucode
            if ($access == 'CITCS') {
                switch ($ucode) {
                    case '001': header('Location: ../users/CITCS/Dean//dean_page.php'); break;
                    case '002': header('Location: ../users/CITCS/ACT//act_page.php'); break;
                    case '003': header('Location: ../users/CITCS/BSIT/bsit_page.php'); break;
                    case '004': header('Location: ../users/CITCS/BSCS/bscs_page.php'); break;
                    default:
                        $_SESSION['error'] = "Invalid ucode.";
                        header('Location: ../users/login.php');
                        echo "<script>console.log('Invalid ucode.');</script>";
                }
            } else {
                header('Location: ../dashboard.php');
            }
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password.";
            // header('Location: ../users/login.php');
            echo "<script>console.log('Incorrect password');</script>";
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid credentials.";
        // header('Location: ../users/login.php');
        echo "<script>console.log('Invalid credentials.');</script>";
        exit();
    }
}
ob_end_flush();
?>
