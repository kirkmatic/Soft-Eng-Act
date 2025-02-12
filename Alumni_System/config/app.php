<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "plmun_alumni_system");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "plmun_alumni_system");

    include_once('db_connection.php');
    $db = new db_connection();
    $conn = $db->getConnection(); 

    function validateInput($db,$input){
        return mysqli_real_escape_string($db,$input);
    }
    
?>