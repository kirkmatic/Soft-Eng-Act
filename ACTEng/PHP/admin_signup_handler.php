<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db_connection.php';

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "INSERT INTO admin_table (username, password) VALUES (?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user, $pass);

        if ($stmt->execute()) {
            echo "<script>alert('Admin successfully registered!');</script>";
            echo "New admin registered successfully";
            header("Location: ../HTML/login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

?>