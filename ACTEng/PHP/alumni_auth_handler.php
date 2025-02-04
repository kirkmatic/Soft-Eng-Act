<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alumni_id = trim($_POST['alumni_id']);
    $password = trim($_POST['password']);

    if ($conn->connect_error) {
        die("Connection failed: {$conn->connect_error}");
    }

    // Retrieve alumni record from database
    $sql = "SELECT alumni_id, password FROM alumni_info_table WHERE alumni_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $alumni_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // DEBUGGING (Remove after testing)
            echo "<script>alert('Entered ID: $alumni_id');</script>";
            echo "<script>alert('Stored ID: {$row['alumni_id']}');</script>";
            echo "<script>alert('Entered Password: $password');</script>";
            echo "<script>alert('Stored Password: {$row['password']}');</script>";

            // Plain-text password verification
            if ($password === $row['password']) {
                $_SESSION['alumni_id'] = $alumni_id;
                header("Location: ../HTML/alumni_page.php");
                exit();
            } else {
                header("Location: ../HTML/alumni_login.php?error=Invalid Password");
                exit();
            }
        } else {
            header("Location: ../HTML/alumni_login.php?error=Invalid Alumni ID");
            exit();
        }

        // $stmt->close(); // Unreachable code
    } else {
        die("Query preparation failed: {$conn->error}");
    }
}

$conn->close();
