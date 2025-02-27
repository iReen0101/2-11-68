<?php
error_reporting(E_ALL);
$host = "localhost";
$username = "root"; 
$password = "";
$dbname = "db_item"; 

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
