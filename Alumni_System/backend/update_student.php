<?php
include('../config/app.php'); 

header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $alumni_id = $_POST['alumni_id'] ?? null;
    $lastname = $_POST['lastname'] ?? null;
    $firstname = $_POST['firstname'] ?? null;
    $middlename = $_POST['middlename'] ?? null;
    $year_graduated = $_POST['year_graduated'] ?? null;
    $batch_name = $_POST['batch_name'] ?? null;
    $program = $_POST['program'] ?? null;

    if (!$alumni_id || !$lastname || !$firstname || !$year_graduated || !$batch_name || !$program) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit();
    }

    $conn->begin_transaction(); // Start transaction

    try {
        // Update students_table
        $stmt1 = $conn->prepare("UPDATE students_table 
                                 SET lastname=?, firstname=?, middlename=? 
                                 WHERE alumni_id=?");
        $stmt1->bind_param("sssi", $lastname, $firstname, $middlename, $alumni_id);
        $stmt1->execute();

        // Update students_background_table
        $stmt2 = $conn->prepare("UPDATE students_background_table 
                                 SET year_graduated=?, batch_name=?, program=? 
                                 WHERE alumni_id=?");
        $stmt2->bind_param("sssi", $year_graduated, $batch_name, $program, $alumni_id);
        $stmt2->execute();

        $conn->commit(); // Commit changes

        echo json_encode(["status" => "success"]);
    } catch (Exception $e) {
        $conn->rollback(); // Rollback if an error occurs
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
}
?>
