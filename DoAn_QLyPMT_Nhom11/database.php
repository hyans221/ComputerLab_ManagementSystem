<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "qlpmt3";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
