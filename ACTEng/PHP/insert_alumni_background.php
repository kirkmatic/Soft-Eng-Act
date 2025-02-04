<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure session variable is set
    if (!isset($_SESSION['alumni_id'])) {
        die("Error: Alumni ID is not set in session.");
    }

    $alumni_id = (int) $_SESSION['alumni_id']; // Convert session value to integer
    $college = trim($_POST['college']);
    $program = trim($_POST['program']);
    $section = trim($_POST['section']);
    $work_status = trim($_POST['work_status']);

    if ($conn->connect_error) {
        die("Connection failed: {$conn->connect_error}");
    }

    // Insert alumni background information into the database
    $sql = "INSERT INTO alumni_background_table (alumni_id, college, program, section, work_status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Corrected type string to "issss"
        $stmt->bind_param("issss", $alumni_id, $college, $program, $section, $work_status);

        if ($stmt->execute()) {
            echo "<script>alert('Background information inserted successfully!');</script>";
            header("Location: ../HTML/alumni_page.php");
            exit();
        } else {
            echo "Error: {$stmt->error}";
        }

        $stmt->close();
    } else {
        die("Query preparation failed: {$conn->error}");
    }

    $conn->close();
}
?>
