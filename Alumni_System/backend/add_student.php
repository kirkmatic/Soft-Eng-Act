<?php
session_start();
include('../../config/app.php'); // Database connection

$conn = $db->getConnection(); // Get MySQL connection

if (isset($_POST['add_student'])) {
    // Retrieve form data
    $alumni_id  = trim($_POST['alumni_id']);
    $lastname   = trim($_POST['lastname']);
    $firstname  = trim($_POST['firstname']);
    $middlename = trim($_POST['middlename']);
    $gender     = trim($_POST['gender']);
    $address    = trim($_POST['address']);
    $email      = trim($_POST['email']);
    $contact    = trim($_POST['contact']);

    // Check for empty fields
    if (empty($alumni_id) || empty($lastname) || empty($firstname) || empty($gender) || empty($address) || empty($email) || empty($contact)) {
        $_SESSION['error'] = "All fields are required.";
        header('Location: ../users/REGISTRAR/registrar.php');
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header('Location: ../users/REGISTRAR/registrar.php');
        exit();
    }

    // Insert data using prepared statement
    $query = "INSERT INTO students_table (alumni_id, lastname, firstname, middlename, gender, address, email, contact) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issssssi", $alumni_id, $lastname, $firstname, $middlename, $gender, $address, $email, $contact);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Student added successfully!";
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
    }

    $stmt->close();
    $conn->close();

    header('Location: ../users/REGISTRAR/registrar.php');
    exit();
}
?>
