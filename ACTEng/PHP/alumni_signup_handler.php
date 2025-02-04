<!-- 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'db_connection.php';
    // Retrieve form data
    $alumni_id = $_POST['alumni_id'];
    $password = $_POST['password'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];

    $sql = "INSERT INTO alumni_info_table (alumni_id, password, lastname, firstname, middlename, gender, birthday, address, email, contact_no)
    VALUES ('$alumni_id', '$password', '$lastname', '$firstname', '$middlename', '$gender', '$birthday', '$address', '$email', '$contact_no')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Successfully registered!');</script>";
        echo "New record created successfully";
        header("Location: ../HTML/login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?> -->
<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);
    $gender = trim($_POST['gender']);
    $birthday = trim($_POST['birthday']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $contact_no = trim($_POST['contact_no']);

    // Validate input fields (you can add more validation as needed)
    if (empty($lastname) || empty($firstname) || empty($contact_no) || empty($email)) {
        echo "Please fill in all required fields.";
        exit();
    }

    // Check if the contact number already exists in the database
    $sql = "SELECT COUNT(*) FROM alumni_info_table WHERE contact_no = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $contact_no);  // Assuming the contact number is a string
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();

        if ($count > 0) {
            // If the contact number already exists
            echo "This contact number is already in use. Please enter a different one.";
        } else {
            // Proceed with inserting new alumni record if contact number is unique
            $insert_sql = "INSERT INTO alumni_info_table (lastname, firstname, gender, birthday, address, email, contact_no)
                           VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            if ($insert_stmt) {
                $insert_stmt->bind_param("sssssss", $lastname, $firstname, $gender, $birthday, $address, $email, $contact_no);
                if ($insert_stmt->execute()) {
                    echo "Alumni record inserted successfully!";
                    echo "<script>alert('Successfully registered!');</script>";
                    echo "New record created successfully";
                    header("Location: login.php");
                } else {
                    echo "Error inserting data: " . $conn->error;
                }
            } else {
                echo "Error preparing insert statement: " . $conn->error;
            }
        }

        $stmt->close();  // Close the prepared statement
    } else {
        echo "Error preparing query: " . $conn->error;
    }
}

$conn->close();  // Close the database connection
?>
