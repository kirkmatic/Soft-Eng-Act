<?php
    include('../config/app.php');

    if(isset($_POST['register_btn']) ) {

        $access = validateInput($db->conn, $_POST['access']);
        $alumni_id = isset($_POST['alumni_id']) ? validateInput($db->conn, $_POST['alumni_id']) : null;
        $uname = validateInput($db->conn, $_POST['uname']);

        $lastname = validateInput($db->conn, $_POST['lastname']);
        $firstname = validateInput($db->conn, $_POST['firstname']);        
        $middlename = validateInput($db->conn, $_POST['middlename']);
        $gender = validateInput($db->conn, $_POST['gender']);
        $birthday = validateInput($db->conn, $_POST['birthday']);
        $address = validateInput($db->conn, $_POST['address']);
        $email = validateInput($db->conn, $_POST['email']);
        $contact_no = validateInput($db->conn, $_POST['contact_no']);
        $password = validateInput($db->conn, $_POST['password']);

        // Set ucode based on uname
        if ($uname == 'Dean') {
            $ucode = '001';
            $alumni_id = '001'; // Set alumni_id to 001 for Dean
        } elseif ($uname == 'ACT') {
            $ucode = '002';
        } elseif ($uname == 'IT') {
            $ucode = '003';
        } elseif ($uname == 'CS') {
            $ucode = '004';
        } else {
            $ucode = '000'; 
        }

        $query = "INSERT INTO users (access, alumni_id, uname, lastname, firstname, middlename, gender, birthday, address, email, contact_no, password, ucode) 
                  VALUES ('$access', '$alumni_id', '$uname', '$lastname', '$firstname', '$middlename', '$gender', '$birthday', '$address', '$email', '$contact_no', '$password', '$ucode')";

        $query_run = mysqli_query($db->conn, $query);

        if($query_run) {
            $_SESSION['message'] = "User Registered Successfully";
            echo "<script>alert('Successfully registered!');</script>";
            echo "New record created successfully";
            header("Location: ../users/login.php");
            exit(0);
        } else {
            $_SESSION['message'] = "User Registration Failed";
            header("Location: ../users/signup.php");
            exit(0);
        }
    }
?>
