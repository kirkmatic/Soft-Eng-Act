<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "plmun_alumni_system");

    include_once('db_connection.php');
    $db = new db_connection();

    function validateInput($db,$input){
        return mysqli_real_escape_string($db,$input);
    }
    
?>