<?php

$servername = "localhost";
$username = "ugochukwu";
$password = "ugochukwu";
$db  =      "shoe";
// Create connection
$con = new mysqli($servername, $username, $password, $db);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 





?>