<?php
session_start();
include('../config/app.php');  // Load database connection

$conn = $db->getConnection(); // Get MySQL connection

if (isset($_POST['login_btn'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($user_id) || empty($password)) {
        echo "<script>
                alert('All fields are required.');
                window.location.href='../users/login.php';
              </script>";
        exit();
    }

    // Fetch user from database using user_id
    $query = "SELECT * FROM users_table WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);  // 'i' because user_id is an integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify the hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row;
            $access = $row['access'];
            $ucode = $row['ucode'];

            // Redirect based on user role
            if ($access === 'Registrar') {
                echo "<script>
                        window.location.href='../users/REGISTRAR/registrar_dashboard.php';
                      </script>";
            } else if ($access === 'CITCS') {
                switch ($ucode) {
                    case '001': 
                        echo "<script>
                                window.location.href='../users/CITCS/Dean/dean_page.php';
                              </script>";
                        break;
                    case '002': 
                        echo "<script>
                                window.location.href='../users/CITCS/ACT/act_page.php';
                              </script>";
                        break;
                    case '003': 
                        echo "<script>
                                window.location.href='../users/CITCS/BSIT/bsit_page.php';
                              </script>";
                        break;
                    case '004': 
                        echo "<script>
                                window.location.href='../users/CITCS/BSCS/bscs_page.php';
                              </script>";
                        break;
                    default:
                        echo "<script>
                                alert('Invalid user code.');
                                window.location.href='../users/login.php';
                              </script>";
                        exit();
                }
            } else {
                echo "<script>
                        alert('Access level not authorized.');
                        window.location.href='../users/login.php';
                      </script>";
                exit();
            }
        } else {
            echo "<script>
                    alert('Incorrect password. Please try again.');
                    window.location.href='../users/login.php';
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('User ID not found.');
                window.location.href='../users/login.php';
              </script>";
        exit();
    }
}
?>
