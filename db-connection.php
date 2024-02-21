<?php

$server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "techsolve_php_test";

// Make connection

$conn = new mysqli($server, $db_user, $db_password, $db_name);

if($conn->connect_error){
    die("Connection error: ". $conn->connect_error);
}

// $conn->close();
?>