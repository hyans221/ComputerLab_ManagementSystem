<?php
include 'database.php';
include 'auth.php';
@session_start();
$conn->set_charset("utf8");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$maPM = $_GET['id'];
$sql = "DELETE FROM phongmay WHERE maPM='$maPM'";

if ($conn->query($sql) === TRUE) {
    header('Location: phongmay_index.php?path=phongmay/list');
} else {
    echo "Error deleting record: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
