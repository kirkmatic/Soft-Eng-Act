<?php
include('../config/app.php'); // Update this path if needed

if (isset($_POST['add_student'])) {
    // Retrieve form data
    $alumni_id = $_POST['alumni_id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $year_graduated = $_POST['year_graduated'];
    $batch_name = $_POST['batch_name'];
    $department = $_POST['department'];
    $program = $_POST['program'];
    $section = $_POST['section'];
    $work_status = $_POST['work_status'];

    // Validate required fields
    if (
        empty($alumni_id) || empty($lastname) || empty($firstname) || empty($gender) || empty($address) ||
        empty($email) || empty($contact) || empty($year_graduated) || empty($batch_name) ||
        empty($department) || empty($program) || empty($section) || empty($work_status)
    ) {
        header("Location: ../views/add_student.php?error=Please fill in all required fields");
        exit();
    }

    $conn->begin_transaction(); // Start transaction

    try {
        // Insert into students table
        $stmt1 = $conn->prepare("INSERT INTO students_table (alumni_id, lastname, firstname, middlename, gender, address, email, contact) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("issssssi", $alumni_id, $lastname, $firstname, $middlename, $gender, $address, $email, $contact);
        $stmt1->execute();

        // Insert into alumni table
        $stmt2 = $conn->prepare("INSERT INTO students_background_table (alumni_id, year_graduated, batch_name, department, program, section, work_status) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("iisssss", $alumni_id, $year_graduated, $batch_name, $department, $program, $section, $work_status);
        $stmt2->execute();

        // Commit transaction if both inserts are successful
        $conn->commit();

        echo "<script>
        window.location.assign('../users/CITCS/BSCS/bscs_records.php');
        </script>";        
        exit();
    } catch (Exception $e) {
        $conn->rollback(); // Rollback changes if error occurs
        header("Location: ../views/add_student.php?error=Failed to add student");
        exit();
    }
}
?>
