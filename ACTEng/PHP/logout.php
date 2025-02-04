<?php
function logoutUser() {
    // Start the session
    session_start();

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: ../HTML/login.php");
    exit();
}

// Call the function to logout the user
logoutUser();
?>