<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "cs3a");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "cs3a");

    include_once('db_connection.php');
    $db = new db_connection();
    $conn = $db->getConnection(); 

    function validateInput($db,$input){
        return mysqli_real_escape_string($db,$input);
    }
    
?>