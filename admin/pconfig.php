<?php
// Database configuration"localhost","root","","profile"
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "unscene";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?> 